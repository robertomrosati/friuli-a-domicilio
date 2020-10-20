/**************************************/
/***Finalmente è il turno dei negozi***/
/**************************************/

/*Insert 5: e_shops */


/*shop 1*/
insert into e_shops(e_shops_name, e_shops_name_long, e_shops_description, e_shops_description_long, e_shops_email, e_shops_telephone_number, e_shops_telephone_number_2, e_shops_address, e_shops_coordinates, e_shops_home_delivery, e_shops_take_away, e_shops_online_service, e_shops_web_site_url, e_shops_visible, e_shops_e_cities_id) values ('Il pesce di Francesco', 'Il pesce di Francesco', 'Pesce e frutti di mare dal 1874', 'Pesce e frutti di mare dal 1874', 'emailshop1@email.com', '0123456789', '', 'Via dei Calamari Fritti, Poseidonia', st_geomfromtext('POINT(46.212546 13.176626)', 4326), 1, 1, 0, '', 1, (select e_cities_id from e_cities where e_cities_description like '%Magnano in Riviera%'));

/*shop 2*/
insert into e_shops(e_shops_name, e_shops_name_long, e_shops_description, e_shops_description_long, e_shops_email, e_shops_telephone_number, e_shops_telephone_number_2, e_shops_address, e_shops_coordinates, e_shops_home_delivery, e_shops_take_away, e_shops_online_service, e_shops_web_site_url, e_shops_visible, e_shops_e_cities_id) values ('Er Vino de Pino', 'Er Vino de Pino', 'Osteria  tipica romana fondata da mio nonno Annibale, piatti tipici: famoce du spaghi alla carbonara e la famigerata coda alla vaccinara', 'Osteria tipica romana fondata da mio nonno Annibale, piatti tipici: famoce du spaghi alla carbonara e la famigerata coda alla vaccinara', 'ervinodepino@lapiramidedicesio.com', '0123456789', '', 'Via della Bufalona 101, Porta Ostiense di Marano Lagunare', st_geomfromtext('POINT(46.142843 13.347073)', 4326), 0, 1, 0, '', 1, (select e_cities_id from e_cities where e_cities_description like '%Faedis%'));

/*shop 3*/
insert into e_shops(e_shops_name, e_shops_name_long, e_shops_description, e_shops_description_long, e_shops_email, e_shops_telephone_number, e_shops_telephone_number_2, e_shops_address, e_shops_coordinates, e_shops_home_delivery, e_shops_take_away, e_shops_online_service, e_shops_web_site_url, e_shops_visible, e_shops_e_cities_id) values('Lo sviluppatore convinto', 'Lo sviluppatore convinto', 'Posso sviluppare qualunque cosa in tempo record, in particolare la mia specialità è HelloWorld.', 'Posso sviluppare qualunque cosa in tempo record, in particolare la mia specialità è HelloWorld.', 'iltuoprogrammatoredifiducia@nuntefidà.org', '0123456789', '', 'Ad trigesimus lapidem, 54', st_geomfromtext('POINT(46.1576 13.216)', 4326), 0, 0, 1, '', 1, (select e_cities_id from e_cities where e_cities_description like '%Tricesimo%'));

