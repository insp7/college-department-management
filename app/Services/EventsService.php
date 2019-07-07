<?php


namespace App\Services;

use App\Event;
use App\EventImage;
use App\NewsFeed;
use App\NewsFeedImage;
use http\Env\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class EventsService
 * @package App\Services
 */
class EventsService
{
    /**
     * @param $validatedData
     * @param $user_id
     * @return mixed
     */
    public function store($validatedData, $user_id) {
        $event = Event::create([
            'name' => $validatedData['name'],
            'details' => $validatedData['details'],
            'address' => $validatedData['address'],
            'type' => $validatedData['type'],
            'start_date' => $validatedData['start_date'],
            'end_date' => $validatedData['end_date'],
            'additional_columns' => 'fhdskfjh',
            'created_by' => $user_id
        ]);

        return $event;

    }


//    public function getDatatable($id)
//    {
//        return Event::where('created_by', $id)->orderBy('created_at', 'desc');
//    }
    /**
     * @return Event[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getDatatable()
    {
        return Event::all();
    }

    /**
     * @param $id
     * @param $user_id
     * @return mixed
     */
    public function delete($id, $user_id) {
        return Event::where('created_by', $user_id)
            ->where('id', $id)
            ->delete();
    }

    /**
     * @param $validatedData
     * @param $id
     * @param $user_id
     * @return bool
     */
    public function update($validatedData, $id, $user_id) {

        try {
            $event = Event::findOrFail($id);
            $event->name = $validatedData['name'];
            $event->details = $validatedData['details'];
            $event->address = $validatedData['address'];
            $event->type = $validatedData['type'];
            $event->start_date = $validatedData['start_date'];
            $event->end_date = $validatedData['end_date'];
            $event->institute_funding = $validatedData['institute_funding'];
            $event->sponsor_funding = $validatedData['sponsor_funding'];
            $event->internal_participants_count = $validatedData['internal_participants_count'];
            $event->external_participants_count = $validatedData['external_participants_count'];
            $event->expenditure = $validatedData['expenditure'];
            $event->additional_columns = $validatedData['additional_columns'];
            $event->updated_by = $user_id;
            $event->save();

            return true;
        } catch (Exception $exception) {
            return false;
        }
    }

    /**
     * @param $event_id
     * @param $coordinators
     * @return bool
     */
    public function addCoordinators($event_id, $coordinators) {
        try {
//            DB::beginTransaction();
                $event = Event::find($event_id);
                $event->staff()->attach($coordinators);
                $event->save();
//            DB::commit();

            return true;
        } catch (Exception $exception) {
            return false;
        }
    }

    /**
     * @param $event_id
     * @param $event
     * @param $image_relative_paths
     * @param $user_id
     * @return bool
     */
    public function eventEnd($event_id, $event, $image_relative_paths, $user_id) {
        try {
//            dd($event);
            DB::beginTransaction();
                // Insert final details about event and end
                $event_row = Event::findOrFail($event_id);
                $event_row->institute_funding = $event['institute_funding'];
                $event_row->sponsor_funding = $event['sponsor_funding'];
                $event_row->expenditure = $event['expenditure'];
                $event_row->internal_participants_count = $event['internal_participants_count'];
                $event_row->external_participants_count = $event['external_participants_count'];
                $event_row->is_completed = 1;
                $event_row->updated_by = $user_id;
                $event_row->updated_at = now();
                $event_row->save();

//                dd($image_relative_paths);

                foreach ($image_relative_paths as $image_relative_path){
                    EventImage::create([
                        'event_id' => $event_id,
                        'event_image_path' => $image_relative_path,
                        'created_by' => $user_id
                    ]);
                }

            DB::commit();

            return true;
        } catch (Exception $exception) {
            return false;
        }
    }

    /**
     * @param $event_id
     * @return mixed
     */
    public function getImagesPath($event_id) {
        return EventImage::where('event_id', $event_id)->get();
    }

    /**
     * @param $event_id
     * @param $user_id
     * @return bool
     */
    public function publishEventAsNews($event_id, $user_id) {
        $event = Event::findOrFail($event_id);

        $title = $event->name;
        $description = $event->details . '<br> Address: ' . $event->address . '<br> Type: ' . $event->type . '<br> Start Date: ' . $event->start_date . '<br> End date: ' . $event->end_date;

        try {
            DB::beginTransaction();
                $newsFeed = NewsFeed::create([
                    'title' => $title,
                    'description' => $description,
                    'created_by' => $user_id
                ]);

                $id = $newsFeed->id;

                $event_images_path = EventImage::where('event_id', $event_id)->get();

                foreach ($event_images_path as $image_path) {
                    NewsFeedImage::create([
                        'news_feed_id' => $id,
                        'image_path' => $image_path->event_image_path

                    ]);
                }

            DB::commit();

            return true;
        } catch(Exception $exception) {
            return false;
        }


    }
}