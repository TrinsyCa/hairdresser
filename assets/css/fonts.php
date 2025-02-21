<?php
    header("Content-Type: text/css"); 
    header("Cache-Control: no-cache, must-revalidate");

    function getFileVersion($file) {
        return file_exists($file) ? filemtime($file) : time();
    }

    $version_solid = getFileVersion($_SERVER["DOCUMENT_ROOT"]."/assets/fonts/manbow/Manbow-Solid.otf");
    $version_tone = getFileVersion($_SERVER["DOCUMENT_ROOT"]."/assets/fonts/manbow/Manbow-Tone.otf");
    $version_spots = getFileVersion($_SERVER["DOCUMENT_ROOT"]."/assets/fonts/manbow/Manbow-Spots.otf");
    $version_clear = getFileVersion($_SERVER["DOCUMENT_ROOT"]."/assets/fonts/manbow/Manbow-Clear.otf");
    $version_basic = getFileVersion($_SERVER["DOCUMENT_ROOT"]."/assets/fonts/manbow/Quicksand-VariableFont_wght.ttf");
?>

@font-face {
    font-family: 'Manbow Solid';
    src: url('/assets/fonts/manbow/Manbow-Solid.otf?v=<?= $version_solid ?>') format('opentype');
    font-weight: normal;
    font-style: normal;
    font-display: swap;
}
@font-face {
    font-family: 'Manbow Tone';
    src: url('/assets/fonts/manbow/Manbow-Tone.otf?v=<?= $version_tone ?>') format('opentype');
    font-weight: normal;
    font-style: normal;
    font-display: swap;
}
@font-face {
    font-family: 'Manbow Spots';
    src: url('/assets/fonts/manbow/Manbow-Spots.otf?v=<?= $version_spots ?>') format('opentype');
    font-weight: normal;
    font-style: normal;
    font-display: swap;
}
@font-face {
    font-family: 'Manbow Clear';
    src: url('/assets/fonts/manbow/Manbow-Clear.otf?v=<?= $version_clear ?>') format('opentype');
    font-weight: normal;
    font-style: normal;
    font-display: swap;
}
@font-face {
    font-family: 'Quicksand';
    src: url('/assets/fonts/quicksand/Quicksand-VariableFont_wght.ttf?v=<?= $version_basic ?>') format('opentype');
    font-weight: normal;
    font-style: normal;
    font-display: swap;
}
