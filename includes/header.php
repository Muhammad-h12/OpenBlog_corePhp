<?php

require 'utils/functions.php';

$static_title = 'Simple CMS | Using Core PHP';
$static_desc = "This Simple CMS has been developed using Core PHP";
$static_heading = "Home";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo !empty($title) ?  html_escape($title) : $static_title; ?></title>
    <meta name="description" content="<?php echo !empty($description) ?  html_escape($description) : $static_desc; ?>">
    <link
            rel="shortcut icon"
            href="assets/images/favicon.png"
            type="image/x-icon"
                />
    <link rel="stylesheet" href="assets/css/animate.css" />
    <link rel="stylesheet" href="assets/css/tailwind.css" />

    <!-- ==== WOW JS ==== -->
    <script src="assets/js/wow.min.js"></script>
    <script>
new WOW().init();
    </script>
</head>
<body>

<!--// include Navbar-->

<?php include_once "includes/navbar.php";?>

<!-- ====== Banner Section Start -->
<div
        class="relative z-10 overflow-hidden bg-primary pt-[120px] pb-[100px] md:pt-[130px] lg:pt-[160px]"
>
    <div class="container">
        <div class="-mx-4 flex flex-wrap items-center">
            <div class="w-full px-4">
                <div class="text-center">
                    <h1 class="text-4xl font-semibold text-white"><?php echo isset($heading) ? $heading : $static_heading ?></h1>
                </div>
            </div>
        </div>
    </div>
    <div>
        <span class="absolute top-0 left-0 z-[-1]">
          <svg
                  width="495"
                  height="470"
                  viewBox="0 0 495 470"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
          >
            <circle
                    cx="55"
                    cy="442"
                    r="138"
                    stroke="white"
                    stroke-opacity="0.04"
                    stroke-width="50"
            />
            <circle
                    cx="446"
                    r="39"
                    stroke="white"
                    stroke-opacity="0.04"
                    stroke-width="20"
            />
            <path
                    d="M245.406 137.609L233.985 94.9852L276.609 106.406L245.406 137.609Z"
                    stroke="white"
                    stroke-opacity="0.08"
                    stroke-width="12"
            />
          </svg>
        </span>
        <span class="absolute top-0 right-0 z-[-1]">
          <svg
                  width="493"
                  height="470"
                  viewBox="0 0 493 470"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
          >
            <circle
                    cx="462"
                    cy="5"
                    r="138"
                    stroke="white"
                    stroke-opacity="0.04"
                    stroke-width="50"
            />
            <circle
                    cx="49"
                    cy="470"
                    r="39"
                    stroke="white"
                    stroke-opacity="0.04"
                    stroke-width="20"
            />
            <path
                    d="M222.393 226.701L272.808 213.192L259.299 263.607L222.393 226.701Z"
                    stroke="white"
                    stroke-opacity="0.06"
                    stroke-width="13"
            />
          </svg>
        </span>
    </div>
</div>
<!-- ====== Banner Section End -->

