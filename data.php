<?php

class Video {
        public $id = "";
        public $videoName = "";
        public $videoViews = "";

        public function __construct($id,$videoName, $videoViews) {
                $this->id = $id;
                $this->videoName = $videoName;
                $this->videoViews = $videoViews;
        }
}

//$start = $_GET['start'];
//die;
$data = array();
$possibleVideos = array(
 '1' => (array)new Video(1,"Dat dat","238,284"),
 '2' => (array)new Video(2,"khiem khiem", "117,328"),
 '3' => (array)new Video(3,"thien thien", "94,256"),
 '4' => (array)new Video(4,"khoa khoa", "66,012"),
 '5' => (array)new Video(5,"nghia nghia", "56,959"),
 '6' => (array)new Video(6,"khang khang", "54,128"),
 '7' => (array)new Video(7,"duy duy", "48,842"),
 '8' => (array)new Video(8,"nho nhia", "47,109"),
 '9' => (array)new Video(9,"deep deep", "45,555"),
 '10' => (array)new Video(10,"chi chi", "44,817"),
 '11' => (array)new Video(11,"cho cho", "40,151"),
 '12' => (array)new Video(12,"abc abc", "35,017"),
 '13' => (array)new Video(13,"hello hello", "34,324"),
 '14' => (array)new Video(14,"hoa hoa", "32,561"),
 '15' => (array)new Video(15,"hien hien", "31,878"),
 '16' => (array)new Video(16,"ngu ngu", "28,794"),
 '17' => (array)new Video(17,"chó điên", "25,604"),
 '18' => (array)new Video(18,"cho dại", "28,794"),
 '19' => (array)new Video(19,"cho cái", "25,604"),
 '20' => (array)new Video(20,"chó mật", "28,794"),
      // '21' => (array)new Video(21,"chó sói", "25,604")
);
$arrExistData =  json_decode($_GET['eData']);

//kiểm tra nếu đầu vào đã có sẵn dữ liệu => xóa những dữ liệu có sẵn trong $possibleVideos
if (count($arrExistData) > 0) {
  foreach ($arrExistData as $obj) {
        foreach ($possibleVideos as $video) {
             if ($video['id'] == $obj->id) {
                  unset($possibleVideos[$video['id']]);  
          }     
  }   
}

// nếu dữ liệu còn sau khi xóa những item đã tồn tại ngoài view
if (count($possibleVideos) > 0) {
        $arrRandom = array_rand($possibleVideos, 4);
        foreach ($arrRandom as $value) {
                array_push($data, $possibleVideos[$value]);                
        }  
}
// trường hợp chỉ còn 4 item sau khi xóa những item đã tồn tại ngoài view
elseif (count($possibleVideos) <= 4) {
        $data = $possibleVideos; 
}

// trường hợp k có dữ liệu có sẵn
}else{
        $arrRandom = array_rand($possibleVideos, 4);
        for ($i = 0; $i < count($arrRandom); $i++) {
                array_push($data, $possibleVideos[$arrRandom[$i]]);
        }
}
echo json_encode($data);
?>
