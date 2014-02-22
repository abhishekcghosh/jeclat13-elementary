<img src="levels/beans.png" height="500" width="700">
<?php require_once('src-hint-start.php');    ?>

public void f(int a, int b){
	for (int num = 0; num < 26; num++)
    	System.out.println(((char)('A'+num)) + ":" + ((char)('A'+(a*num + b)% 26)));
}

<?php require_once('src-hint-stop.php');    ?>

