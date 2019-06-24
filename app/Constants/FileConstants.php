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
    // The path for all images
    const IMAGE_PATH = "/storage/images/";
    // Category Image Path
    const CATEGORY_IMAGE_PATH = FileConstants::IMAGE_PATH."category/";
    // Invoices
    const LR_IMAGE_PATH = FileConstants::IMAGE_PATH."invoice/lr/";
    // Subcategory Image Path
    const SUBCATEGORY_IMAGE_PATH = FileConstants::IMAGE_PATH."subcategory/";

    const INVOICE_PATH = "/storage/invoices";

    const FEED_IMAGE_PATH = FileConstants::IMAGE_PATH."feeds/";
}
