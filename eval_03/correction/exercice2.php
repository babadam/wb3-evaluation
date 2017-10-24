<?php

// fonction pour convertir en EUR/USD

function convertir($montant, $devise){
	if($devise == 'USD' || $devise == 'EUR'){
		if(is_numeric($montant)){
			
			if($devise == 'USD'){
				return round($montant * 1.085965, 2);
			}
			else{
				return round($montant * 0.85965, 2);
			}	
		}
		else{
			return 'Veuillez insérer un montant valide';
		}
	}
	else{
		return 'Devise acceptée : Dollars ou euros';
	}
}

echo '123 euro équivalent à ' . convertir(123, 'USD') . '$ americains<br/>';
echo '178 USD équivalent à ' . convertir(178, 'EUR') . '€';