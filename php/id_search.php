<?
  session_start();
?>
<meta charset="utf-8">
<?

include "dbconn.php";
mysqli_query($connect,'set names utf8');

$email_hp=$_POST['email_hp'];

$sql = "select * from member where email='$email_hp' OR hp='$email_hp'";
$result = mysqli_query( $connect,$sql);
$num_match = mysqli_fetch_array($result);  

if(!empty($num_match)){
    echo "<script>alert('회원님의 아이디는 $num_match[id]입니다. 로그인해주세요');
    location.href='login_form.php';</script>";
}
else{
    echo $hp."<script>alert('아이디 찾기 실패');
    location.href = './id_screen.php';</script>";  
}
mysqli_close($connect);
?>