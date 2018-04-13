<?php
class C7ArrayKit
{

	// =====================================================================================================
	/*
	* Removes any non-alphanumeric characters or not in the $allowed array.
	* @param array $array1
	* @param array $array2
	* @return bool
	*/
	function compareRecursive( $array1, $array2 )
	{
		if ( ! (is_array($array1) && (is_array($array2))) ) {
			return false;
		}
		if ( ! count($array1) == count($array2) ) {
			return false; // arrays don't have same number of entries
		}
		foreach ( $array1 as $key => $val ) {
			if ( ! array_key_exists($key, $array2) ) {
				return false; // uncomparable array keys don't match
			} elseif ( is_array($val) && is_array($array2[$key]) ) {  // if both entries are arrays then compare recursive
				if ( ! compareRecursive( $val, $array2[$key] ) ) {
					return false;
				}
			} elseif ( ! ($val === $array2[$key]) ) { // compare entries must be of same type.
				return false;
			}
		}
		return true; // $array1 === $array2
	}



} # End C7ArrayKit