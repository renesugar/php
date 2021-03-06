<?php
include "connect.inc";

$link = ldap_connect_and_bind($host, $port, $user, $passwd, $protocol_version);
insert_dummy_data($link, $base);

$dn = "$base";
$filter = "(objectclass=person)";

var_dump(
	$result = ldap_search(array($link, $link), $dn, $filter),
	$result0 = ldap_get_entries($link, $result[0]),
	ldap_get_entries($link, $result[1]) === $result0
);
var_dump(
	$result = ldap_search(array($link, $link), null, $filter),
	ldap_get_entries($link, $result[0]),
	ldap_get_entries($link, $result[1])
);
var_dump(
	$result = ldap_search(array($link, $link), null, array($filter, $filter)),
	ldap_get_entries($link, $result[0]),
	ldap_get_entries($link, $result[1])
);
?>
===DONE===
