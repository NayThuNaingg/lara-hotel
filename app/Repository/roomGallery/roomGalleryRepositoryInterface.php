<?php
    namespace App\Repository\roomGallery;
    interface roomGalleryRepositoryInterface {
        public function getRoomGalleryById($roomId);   
        public function postRoomGallery($data);
        public function deleteRoomGallery($id);
        public function editRoomGallery($id);
        public function updateRoomGallery($id);
    
    }
?>