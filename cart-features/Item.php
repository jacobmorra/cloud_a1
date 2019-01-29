<?php
class Item{
	
	public $itnum = 0;
	
	//getter method;
	public function getItemNum(){
		return $this->itnum;
		
	}
	//setter method
	public function setItemNum($val){
		$this->itnum = $val;
	}
}
class Twix extends Item{
		
	public function addItemNum($add){	
		$total = $this->getItemNum() + $add;//get item number, then add $add
		$this->setItemNum($total); //update item number with setItemNum
		return ($total);
	}
	public function rmvItemNum($rmv){	
		$total = $this->getItemNum() - $rmv;//get item number, subtract $rmv
		if ($total>=0){				//only return total if its 0 or greater
			$this->setItemNum($total);
			return ($total);	
		}
		else{
			return 0;
		}
		
	}
	
	public function getCost(){
		return ($this->getItemNum()) * 4.99;
	}
}

class KitKat extends Item{
	
	public function addItemNum($add){	
		$total = $this->getItemNum() + $add;//get item number, then add $add
		$this->setItemNum($total);//update item number with setItemNum
		return ($total);
	}
	public function rmvItemNum($rmv){	
		$total = $this->getItemNum() - $rmv;//get item number, subtract $rmv
		if ($total>=0){				//only return total if its 0 or greater	
			$this->setItemNum($total);
			return ($total);	
		}
		else{
			return 0;
		}
		
	}
	public function getCost(){
		return ($this->getItemNum()) * 3.99;
	}
}

class Mars extends Item{
	
	public function addItemNum($add){	
		$total = $this->getItemNum() + $add;//get item number, then add $add
		$this->setItemNum($total);//update item number with setItemNum
		return ($total);
	}
	public function rmvItemNum($rmv){	
		$total = $this->getItemNum() - $rmv;//get item number, subtract $rmv
		if ($total>=0){				//only return total if its 0 or greater
			$this->setItemNum($total);
			return ($total);	
		}
		else{
			return 0;
		}
		
	}
	
	public function getCost(){
		return ($this->getItemNum()) * 2.99;
	}
}
?>
