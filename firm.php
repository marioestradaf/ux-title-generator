<?
/*  An image Job Title Generator with funny random titles for your email templates.
 *  Copyright (C) 2013  Mario Estrada
 *  Mario Estrada - UI/UX Deisgner
 *  URL: www.marioestrada.me
 *  Twitter: @marioestrada
 *
 *  This program is free software; you can redistribute it and/or
 *  modify it under the terms of the GNU General Public License
 *  as published by the Free Software Foundation; either version 2
 *  of the License, or (at your option) any later version.
 *  
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *  
 *  You should have received a copy of the GNU General Public License
 *  along with this program; if not, write to the Free Software
 *  Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 */
?>
<?php
    header ('Content-Type: image/png');

    // Setting name and job from params values
    $title_name = $_GET['name'];
    if ($_GET['job']) {
        $job_name = $_GET['job'];        
    }
    else{
        // Let's Random!
        // Creating the dimensions
        $levels =  array("Associate","Senior","Junior","Heavyweight","Middleweight","Principal","Chief","Black Belt","Lead","Head");
        $practice = array("Usability","User Centered Design","User Experience","User Interface","GUI","IxD","UI/UX","Human Factors","Visual","Front End Design","Content","Information","Interaction");
        $orientaton = array("Analyst","Architect","Champion","Consultant","Crusader","Designer","Developer","Director","Evangelist","Extraordinaire","God","Guru","Hero","Expert","Manager","Producer","Ninja","Practitioner","Professional","Researcher","Rock Star","Specialist","Sorcerer","Strategist","Technologist"); 
        $job_name = $levels[array_rand($levels)]." ".$practice[array_rand($practice)]." ".$orientaton[array_rand($orientaton)];
    };

    // Create the image object
    $image = @imagecreatetruecolor(300, 50) or die('Error initilizing new GD stream');
    
    imagesavealpha($image, true);

    $trans_colour = imagecolorallocatealpha($image, 0, 0, 0, 127);
    imagefill($image, 0, 0, $trans_colour);
    
    // Loading Fonts
    //putenv('GDFONTPATH=' . realpath('.'));
    
    $name_font = '/fonts/IstokWeb-Bold.ttf';
    $name_color = imagecolorallocate($image, 27, 28, 22);
    
    $job_font = '/fonts/IstokWeb-Regular.ttf';
    $job_color = imagecolorallocate($image, 27, 28, 22);

    // Printing!
    imagettftext($image, 12, 0, 5, 20, $name_color, $name_font, $title_name);
    imagettftext($image, 10, 0, 5, 35, $job_color, $job_font, $job_name);

    // Show and Destroy, start and end, alpha and omega.
    imagepng($image);
    imagedestroy($image);
?>