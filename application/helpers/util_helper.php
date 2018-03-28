<?php

	if(!function_exists("remplazo"))
	{

    	function remplazo($controller)
    	{
    		return str_replace("Controller","",$controller);
    	}

	}