<<<<<<< HEAD
<?php 
namespace App\Repository\View;
interface ViewRepositoryInterface {
    public function postView($data);
}
=======
<?php

namespace App\Repository\View;

interface ViewRepositoryInterface
{
    public function postView($data);
    public function viewListing();
    public function viewEdit($id);
    public function viewUpdate($data);
    public function viewDelete($id);
}
>>>>>>> 2c61e9d1453a61269cbb2ec27ea7004e2e183eeb
