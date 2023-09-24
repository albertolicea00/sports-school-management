<?php

if (!function_exists('random_sport_image')) {
    function random_sport_image($sportName)
    {
        $sportNameLowerCase = strtolower(str_replace(['á', 'é', 'í', 'ó', 'ú'], ['a', 'e', 'i', 'o', 'u'], $sportName));
        $imageFolder = public_path("assets/img/xsports/{$sportNameLowerCase}");
        $imageFiles = scandir($imageFolder);
        $imageFiles = array_diff($imageFiles, ['.', '..']);
        $imageFileArray = array_values($imageFiles);
        $randomIndex = array_rand($imageFileArray);
        $randomImageName = $imageFileArray[$randomIndex];

        // Define la ruta completa de la imagen seleccionada al azar
        $sportImage = asset("assets/img/xsports/{$sportNameLowerCase}/{$randomImageName}");

        return $sportImage;
    }
}
