<?php session_start();
class Cart {
    protected $cart_contents = array();
    
    public function __construct(){
        //traer el carro del arreglo desde la sesion
        $this->cart_contents = !empty($_SESSION['cart_contents'])?$_SESSION['cart_contents']:NULL;
		if ($this->cart_contents === NULL){
			//colocar valores base
			$this->cart_contents = array('cart_total' => 0, 'total_items' => 0);
		}
    }

	public function contents(){
		// contenido
		$cart = array_reverse($this->cart_contents);

		//remover para evitar error
		unset($cart['total_items']);
		unset($cart['cart_total']);

		return $cart;
	}

	public function get_item($row_id){
		return (in_array($row_id, array('total_items', 'cart_total'), TRUE) OR ! isset($this->cart_contents[$row_id]))
			? FALSE
			: $this->cart_contents[$row_id];
	}

	public function total_items(){
		return $this->cart_contents['total_items'];
	}

	public function total(){
		return $this->cart_contents['cart_total'];
	}
    
	public function insert($item = array()){
		if(!is_array($item) OR count($item) === 0){
			return FALSE;
		}else{
            if(!isset($item['id'], $item['nombre'], $item['precio'], $item['qty'])){
                return FALSE;
            }else{
                //
                $item['qty'] = (float) $item['qty'];
                if($item['qty'] == 0){
                    return FALSE;
                }
                //
                $item['precio'] = (float) $item['precio'];
                //crear llave primaria
                $rowid = md5($item['id']);
                //traer cantidad si ya esta listo
                $old_qty = isset($this->cart_contents[$rowid]['qty']) ? (int) $this->cart_contents[$rowid]['qty'] : 0;
                // actualiza la cantidad
                $item['rowid'] = $rowid;
                $item['qty'] += $old_qty;
                $this->cart_contents[$rowid] = $item;
                
                //guarda los productos del carrito
                if($this->save_cart()){
                    return isset($rowid) ? $rowid : TRUE;
                }else{
                    return FALSE;
                }
            }
        }
	}
    
	public function update($item = array()){
		if (!is_array($item) OR count($item) === 0){
			return FALSE;
		}else{
			if (!isset($item['rowid'], $this->cart_contents[$item['rowid']])){
				return FALSE;
			}else{
				//
				if(isset($item['qty'])){
					$item['qty'] = (float) $item['qty'];
					//si la cantidad es 0, quita los productos del carro
					if ($item['qty'] == 0){
						unset($this->cart_contents[$item['rowid']]);
						return TRUE;
					}
				}
				
				//se actualizan las tablas
				$keys = array_intersect(array_keys($this->cart_contents[$item['rowid']]), array_keys($item));
				//
				if(isset($item['precio'])){
					$item['precio'] = (float) $item['precio'];
				}
				//no cambiar las llaves
				foreach(array_diff($keys, array('id', 'nombre')) as $key){
					$this->cart_contents[$item['rowid']][$key] = $item[$key];
				}
				//guardar datos del carrito
				$this->save_cart();
				return TRUE;
			}
		}
	}
    
	protected function save_cart(){
		$this->cart_contents['total_items'] = $this->cart_contents['cart_total'] = 0;
		foreach ($this->cart_contents as $key => $val){
			//
			if(!is_array($val) OR !isset($val['precio'], $val['qty'])){
				continue;
			}
	 
			$this->cart_contents['cart_total'] += ($val['precio'] * $val['qty']);
			$this->cart_contents['total_items'] += $val['qty'];
			$this->cart_contents[$key]['subtotal'] = ($this->cart_contents[$key]['precio'] * $this->cart_contents[$key]['qty']);
		}
		
		//si el carrito esta vacio, se borra contenido de la sesion
		if(count($this->cart_contents) <= 2){
			unset($_SESSION['cart_contents']);
			return FALSE;
		}else{
			$_SESSION['cart_contents'] = $this->cart_contents;
			return TRUE;
		}
    }
    
	 public function remove($row_id){
		//guardar
		unset($this->cart_contents[$row_id]);
		$this->save_cart();
		return TRUE;
	 }

	public function destroy(){
		$this->cart_contents = array('cart_total' => 0, 'total_items' => 0);
		unset($_SESSION['cart_contents']);
	}
}