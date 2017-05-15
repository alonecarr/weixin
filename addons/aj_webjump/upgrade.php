<?php
if(!pdo_fieldexists('aj_webjump_player',  'status')) {
	pdo_query("ALTER TABLE ".tablename('aj_webjump_player')." ADD  `status` int(1) NOT NULL;");
}

?>