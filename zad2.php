<?php
    interface Movable {
        function moveUp(): void;
        function moveDown(): void;
        function moveLeft(): void;
        function moveRight(): void;
    }

    class MovablePoint implements Movable {
        private $x, $y;

        function __construct($x, $y) {
            $this->x = $x;
            $this->y = $y;
        }

        function moveUp(): void
        {
            $this->y = $this->y - $_POST['speed'];
        }

        function moveDown(): void
        {
            $this->y = $this->y + $_POST['speed'];
        }

        function moveLeft(): void
        {
            $this->x = $this->x - $_POST['speed'];
        }

        function moveRight(): void
        {
            $this->x = $this->x + $_POST['speed'];
        }

        function printImage() {
            $image = imagecreate(700,700);
            $white = imagecolorallocate($image, 1, 1, 1);
            $color = imagecolorallocate($image, 0xFF, 0xFF, 0xFF);
            imagefilledrectangle($image, $this->x, $this->y, $this->x + 200, $this->y - 200, $color);
            imagejpeg($image, "image.jpg");

            return header('Location: http://jzaw.vxm.pl/image.jpg');
        }
    }
    error_reporting(0);

    if(file_exists("image.jpg")) {
        unlink("image.jpg");
    }

    switch($_POST['option']) {
        case 'up':
            $object = new MovablePoint(200,400);
            $object->moveUp();
            $object->printImage();
            break;

        case 'down':
            $object = new MovablePoint(200,400);
            $object->moveDown();
            $object->printImage();
            break;

        case 'left':
            $object = new MovablePoint(200,400);
            $object->moveLeft();
            $object->printImage();
            break;

        case 'right':
            $object = new MovablePoint(200,400);
            $object->moveRight();
            $object->printImage();
            break;
        case '':
            $object = new MovablePoint(200,400);
            $object->printImage();
            break;
    }
