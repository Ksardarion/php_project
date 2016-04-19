<?php
//current page
if ( isset($_GET['page']) ) {
    $page = (int)$_GET['page'];
    if ( $page < 1 ) $page = 1;
} else {
    $page = 1;
}
//all page count
$stages = 3;
$count_sql = "SELECT * FROM `contacts` WHERE `user_id` = '$user_id'";
$c_q = mysqli_query($db,$count_sql);
$total_pages = mysqli_num_rows($c_q);
$lastPage = ceil($total_pages / $ipp);
$total_pages = $lastPage;
if($page && $page > 1){
    $start = ($page - 1) * $ipp;
} else {
    $start = 0;
}
if ($page == 0) $page = 1;
$prev = $page - 1;
$next = $page + 1;
$preLastPage = $lastPage - 1;
$paginate = '';
if ($lastPage > 1) {
  $paginate .= "<div class='paginate'>";
  // Previous
  if ($page > 1){
     $paginate.= "<a href='?page=$prev'>previous</a>";
  }else{
     $paginate.= "<span class='disabled'>previous</span>";
  }
// Pages 
  if ($lastPage < 7 + ($stages * 2))  // Not enough pages to breaking it up
  {  
     for ($counter = 1; $counter <= $lastPage; $counter++)
     {
        if ($counter == $page){
           $paginate.= "<span class='current'>$counter</span>";
        }else{
           $paginate.= "<a href='?page=$counter'>$counter</a>";}              
     }
  }
  elseif($lastPage > 5 + ($stages * 2))  // Enough pages to hide a few?
  {
     // Beginning only hide later pages
     if($page < 1 + ($stages * 2))    
     {
        for ($counter = 1; $counter < 4 + ($stages * 2); $counter++)
        {
           if ($counter == $page){
              $paginate.= "<span class='current'>$counter</span>";
           }else{
              $paginate.= "<a href='?page=$counter'>$counter</a>";}              
        }
        $paginate.= "...";
        $paginate.= "<a href='?page=$preLastPage'>$preLastPage</a>";
        $paginate.= "<a href='?page=$lastPage'>$lastPage</a>";    
     }
     // Middle hide some front and some back
     elseif($lastPage - ($stages * 2) > $page && $page > ($stages * 2))
     {
        $paginate.= "<a href='?page=1'>1</a>";
        $paginate.= "<a href='?page=2'>2</a>";
        $paginate.= "...";
        for ($counter = $page - $stages; $counter <= $page + $stages; $counter++)
        {
           if ($counter == $page){
              $paginate.= "<span class='current'>$counter</span>";
           }else{
              $paginate.= "<a href='?page=$counter'>$counter</a>";}              
        }
        $paginate.= "...";
        $paginate.= "<a href='?page=$preLastPage'>$preLastPage</a>";
        $paginate.= "<a href='?page=$lastPage'>$lastPage</a>";    
     }
     // End only hide early pages
     else
     {
        $paginate.= "<a href='?page=1'>1</a>";
        $paginate.= "<a href='?page=2'>2</a>";
        $paginate.= "...";
        for ($counter = $lastPage - (2 + ($stages * 2)); $counter <= $lastPage; $counter++)
        {
           if ($counter == $page){
              $paginate.= "<span class='current'>$counter</span>";
           }else{
              $paginate.= "<a href='?page=$counter'>$counter</a>";}              
        }
     }
  }
        // Next
  if ($page < $counter - 1){ 
     $paginate.= "<a href='?page=$next'>next</a>";
  }else{
     $paginate.= "<span class='disabled'>next</span>";
     }
     
  $paginate.= "</div>";   
}
?>