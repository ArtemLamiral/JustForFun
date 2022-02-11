<?php

class Register{

	/*Функция регистрации пользователя*/

	public function registration($reg_data = NULL)
	{
		//Регистрация
		$model_path = "src/PHP/Model/Register_model.php";

		echo $model_path;

		if(file_exists($model_path))
		{
			require($model_path);
		}else
		{
			echo $model_path." not found!";
			return;
		}
	}
}

?>