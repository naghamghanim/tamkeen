@if(\Session::get("msg"))
<?php
$msg=\Session::get("msg");
$class="alert-info";

if(strstr(strtolower($msg),"s:"))
{
    $msg=substr($msg,2);
    $class='alert-success';
   // echo $class;
}
else if(strstr(strtolower($msg),"i:"))
{
    $msg=substr($msg,2);
    $class='alert-info';
   // echo $class;
}
else if(strstr(strtolower($msg),"w:"))
{
    $msg=substr($msg,2);
    $class='alert-warning';
   // echo $class;
}
else if(strstr(strtolower($msg),"e:"))
{
    $msg=substr($msg,2);
    $class='alert-danger';
   // echo $class;
}

?>
    <div class="alert {{$class}} alert-dismissible fade show" role="alert">{{$msg}}
    
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    
    </div>
@endif