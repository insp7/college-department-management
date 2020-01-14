<?php
/**
 * Created by PhpStorm.
 * User: gauravpunjabi
 * Date: 2/28/19
 * Time: 1:54 PM
 */

namespace App\Constants;

/**
 * Stores path for image directory for each and every entity.
 * Interface FileConstants
 * @package App\Constants
 */
interface FileConstants
{
    // The path for all uploads
    const ATTACHMENTS_PATH = "/storage/attachments/";
    // Staff Details Uploads Path
    const STAFF_ATTACHMENTS_PATH = FileConstants::ATTACHMENTS_PATH . "staff/";
        // News Feed Uploads Path
    const NEWS_FEED_ATTACHMENTS_PATH = FileConstants::ATTACHMENTS_PATH . "news-feed/";
  // Event Images Upload Path
    const EVENT_IMAGES_ATTACHMENTS_PATH = FileConstants::ATTACHMENTS_PATH . "event-images/";
    // Internship Detailes image Path   
    const STUDENT_INTERNSHIP_ATTACHMENTS_PATH = FileConstants::ATTACHMENTS_PATH."student-internship/";
    // Staff courses Uploads Path
    const STAFF_COURSES_ATTACHMENTS_PATH = FileConstants::STAFF_ATTACHMENTS_PATH . "courses/";
    // Staff Events Uploads Path
    const STAFF_EVENTS_ATTACHMENTS_PATH = FileConstants::STAFF_ATTACHMENTS_PATH . "events/";
    // Staff courses Uploads Path
    const STAFF_LECTURES_ATTACHMENTS_PATH = FileConstants::STAFF_ATTACHMENTS_PATH . "lectures/";
}
