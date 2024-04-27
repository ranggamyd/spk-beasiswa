<?php

	function custom_format_number($value) {
		if(floatval($value) == intval($value)) {
			return number_format($value, 0, ',', '.');
		} else {
			return number_format($value, 2, ',', '.');
		}
	}