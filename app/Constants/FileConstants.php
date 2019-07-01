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
    const STAFF_ATTACHMENTS_PATH = FileConstants::ATTACHMENTS_PATH."staff/";

    // Staff Details Uploads Path
    const NEWS_FEED_ATTACHMENTS_PATH = FileConstants::ATTACHMENTS_PATH."news-feed/";
}
