<h1>test je prosao ok</h1>
<?php
if (isset($this->ulogovanUser)){
echo "Ulogovan user je : $this->ulogovanUser";
echo "<br />";
};
echo '<a href="'. URL . 'mojtest/sacuvaj">sacuvaj</a>';
echo '&nbsp';
echo '<a href="'. URL . 'mojtest/index">nazad</a>';
//echo $this->mojtest->nesto;
//echo '<td><a href="'. URL . 'note/edit/' . $value['noteid'].'">Edit</a></td>';
?>