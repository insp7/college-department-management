<?php

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
    // Acheivements Detailes image Path   
    const STUDENT_Acheivements_ATTACHMENTS_PATH = FileConstants::ATTACHMENTS_PATH."staff-Acheivements/";
    // publication Detailes image Path   
    const PUBLICATION_ATTACHMENTS_PATH = FileConstants::ATTACHMENTS_PATH."publication/";

}
