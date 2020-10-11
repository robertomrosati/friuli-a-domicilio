 /***********************************************
 *  NOTE GENERALI SU QUESTO DATABASE
 *
 *  E_, R_ o T_ prima di una tabella indicano se si tratta di un'entità o di una tabella di relazione o di dominio, in riferimento allo schema E-R
 *  Tutte le tabelle hanno un campo che indica l'Id univoco e numerico per la riga. L'insert o l'upsert (vedere se c'è  upsert in mysql) di nuove righe deve essere fatto con l'autoincrement.
 *  Tutte le tabelle riportano il nome della tabella in ogni campo
 *  Le referenze ad altre tabelle (chiavi esterne / foreign keys) vengono sempre fatte da Id a Id. Il campo che contiene la referenza si chiamerà, secondo la nomenclatura definita, nometabella_nometabellareferenziata_Id
 *
 *
 *
 *
 *
 ***********************************************/
 
/******************************/
/*** NUOVO IN VERSIONE 0.0.5***/
/******************************/

create table e_nations
(
   e_nations_id int primary key not null auto_increment,   
	e_nations_code varchar(32) not null,                    /*nuts code european union*/
	e_nations_description varchar(512),
   e_nations_description_ita varchar(512),
   e_nations_visible boolean,
   unique key (e_nations_code)
);

create table e_regions
(  
	e_regions_id int primary key not null auto_increment,   
	e_regions_code varchar(32) not null,                   /*nuts code european union*/
	e_regions_description varchar(512),
   e_regions_description2 varchar(512),
	e_regions_visible boolean,
   e_regions_e_nations_id int references e_nations(e_nations_id),
   unique key (e_regions_code)
);

create table e_provinces
(
	e_provinces_id int primary key not null auto_increment,  
	e_provinces_code varchar(32) not null,                 /*nuts code european union*/
   e_provinces_code_local varchar(32),                    /*es: ud, na, pg...*/
	e_provinces_description varchar(512),
	e_provinces_visible boolean,
   e_provinces_e_regions_id int references e_regions(e_regions_id),
   unique key (e_provinces_code)
);

create table e_cities
(
   e_cities_id int primary key not null auto_increment,
   e_cities_code varchar(32) not null,           /*codice nuts paese + codice catasto*/
   e_cities_code_local varchar(32),              /*solo codice catasto*/
   e_cities_description varchar(512),            /*nome del comune*/
   e_cities_visible boolean,
   e_cities_e_provinces_id int references e_provinces(e_provinces_id),
   unique key (e_cities_code)
);

/*******************************/
/*** nuovo in versione 0.0.13***/
/*******************************/

create table t_file_types
(
   t_file_types_id int primary key not null auto_increment,
   t_file_types_code varchar(32) not null,           /*es: img, txt...*/
   t_file_types_name varchar(64),                    /*es:picture, video..*/
   t_file_types_description varchar(1024),
   t_file_types_visible boolean,                /*0 if type is no longer existing*/ 
   unique key (t_file_types_code)
);

create table e_files
(
   e_files_id int primary key not null auto_increment,
   e_files_path varchar(512) not null,                 /*path after base_url()*/
   e_files_name varchar(256),                               
   e_files_extension varchar(10),
   e_files_description varchar(1024),
   e_files_visible boolean,                            /*0 if the file has been phisically deleted on the server*/
   e_files_t_file_types_id int references t_file_types(t_file_types_id),
   unique key (e_files_path)
);

create table e_categories
(
   e_categories_id int primary key not null auto_increment, 
   e_categories_code varchar(32) not null,
   e_categories_name varchar(256),
   e_categories_description varchar(1024),
   e_categories_visible boolean,             /*0 if category is no longer existing*/
   e_categories_e_files_id int references e_files(e_files_id),    /*se la categoria ha una foto assegnata, mettiamo il riferimento alla foto qui*/
   unique key (e_categories_code)
);

/*tan-tan-tan-dan... la tabella centrale di tutto friuli a domicilio! */
create table e_shops
(
   e_shops_id int primary key not null auto_increment,
   e_shops_name varchar(64),
   e_shops_name_long varchar(256),
   e_shops_description varchar(2048),
   e_shops_description_long varchar(4096),
   e_shops_email varchar(256),
   e_shops_telephone_number varchar(20),
   e_shops_telephone_number_2 varchar(20),
   e_shops_address varchar(512),
   e_shops_coordinates point,            /*ricordare per insert srid è 4326*/
   e_shops_home_delivery boolean,
   e_shops_take_away boolean,
   e_shops_online_service boolean,
   e_shops_web_site_url varchar(512),
   e_shops_visible boolean,              /*0 if shop is no longer existing*/
   e_shops_e_cities_id int references e_cities(e_cities_id),
   unique key (e_shops_name)
);

create table r_e_shops_e_categories
(
   r_e_shops_e_categories_id int primary key not null auto_increment,
   r_e_shops_e_categories_e_shops_id int references e_shops(e_shops_id),
   r_e_shops_e_categories_e_categories_id int references e_categories(e_categories_id),
   r_e_shops_e_categories_main_category boolean,   /*categoria principale del negozio*/
   r_e_shops_e_categories_visible boolean
);

create table e_delivery_routes
(
   e_delivery_routes_id int primary key not null auto_increment,
   e_delivery_routes_e_shops_id int references e_shops(e_shops_id),
   e_delivery_routes_e_cities_id int references e_cities(e_cities_id),
   e_delivery_routes_price double,
   e_delivery_routes_visible boolean
);

create table r_e_shops_e_files    /*tabella di relazione tra i negozi  e le foto*/
(
   r_e_shops_e_files_id int primary key not null auto_increment,
   r_e_shops_e_files_e_shops_id int references e_shops(e_shops_id),
   r_e_shops_e_files_e_files_id int references e_files(e_files_id),
   r_e_shops_e_files_main_picture boolean,
   r_e_shops_e_files_visible boolean
);

create table t_social_network_types /*dominio social networks*/
(
   t_social_network_types_id int primary key not null auto_increment,
   t_social_network_types_code varchar(32) not null,         /*es: whp, fcb...*/
   t_social_network_types_name varchar(64),                  /*es:facebook, instagram..*/
   t_social_network_types_description varchar(1024),
   t_social_network_types_visible boolean,                /*0 if type is no longer existing*/ 
   t_social_network_e_files_id int references e_files(e_files_id),    /*icona che rappresenta quello specifico social network*/
   unique key (t_social_network_types_code)
);

create table e_social_network_profiles
(
   e_social_network_profiles_id int primary key not null auto_increment,
   e_social_network_profiles_t_social_network_types_id int references t_social_network_types(t_social_network_types_id),    /*tipo di social network su cui è presente il contatto o profilo*/
   e_social_network_profiles_e_shops_id int references e_shops(e_shops_id),   /*negozio che possiede il contatto o profilo*/
   e_social_network_profiles_value varchar(1024), /*link, nomeutente, url, o altro*/
   e_social_network_profiles_visible boolean /*vale 0 se il profilo è stato disattivato*/
);

/*******************************/
/*** NUOVO IN VERSIONE 0.0.XX***/
/*******************************/



-- /*FIRST VERSION BY DIEGO COLAUTTI - FOR MICROSOFT SQL SERVER
-- create table E_Nation
-- (
	-- E_Nation_Key int NOT NULL,
	-- E_Nation_Id nvarchar (512),
	-- E_Nation_Description nvarchar (512),
    -- PRIMARY KEY (E_Nation_Key)
-- );


-- create table E_Region
-- (
	-- E_Region_Key int NOT NULL,
	-- E_Region_Id nvarchar (512),
	-- E_Region_Description nvarchar (512),
	-- E_Nation_Key int,
    -- PRIMARY KEY (E_Region_Key),
	-- FOREIGN KEY (E_Nation_Key) REFERENCES E_Nation(E_Nation_Key)
-- );

-- create table E_Province
-- (
	-- E_Province_Key int NOT NULL,
	-- E_Province_Id nvarchar (512),
	-- E_Province_Description nvarchar (512),
	-- E_Region_Key int,
    -- PRIMARY KEY (E_Province_Key),
	-- FOREIGN KEY (E_Region_Key) REFERENCES E_Region(E_Region_Key)
-- );

-- create table E_City
-- (
	-- E_City_Key int NOT NULL,
	-- E_City_Id nvarchar (512),
	-- E_City_Description nvarchar (512),
	-- E_Province_Key int,
    -- PRIMARY KEY (E_City_Key),
	-- FOREIGN KEY (E_Province_Key) REFERENCES E_Province(E_Province_Key)
-- );

-- create table E_Store
-- (
	-- E_Store_Key int NOT NULL,
	-- E_Store_Id nvarchar (256),
	-- E_Store_Name nvarchar (512),
	-- E_Store_Description nvarchar (2048),
	-- E_Store_Email nvarchar (256),
	-- E_Store_Dialling_Code nvarchar (4),
	-- E_Store_Telephone nvarchar (12),
	-- E_Store_Address nvarchar (512),
	-- E_Store_Latitude decimal (9,6),
	-- E_Store_Longitude decimal (9,6),
	-- E_Store_In_Store_Pickup bit,
	-- E_City_Key int
	-- PRIMARY KEY (E_Store_Key),
	-- FOREIGN KEY (E_City_Key) REFERENCES E_City(E_City_Key)
-- );

-- create table E_Deliveries
-- (
	-- E_Store_Key int NOT NULL,
	-- E_City_Key int NOT NULL,
	-- E_Deliveries_Transport_Mode nvarchar (512),
	-- E_Province_Key int,
    -- PRIMARY KEY (E_City_Key, E_Store_Key),
	-- FOREIGN KEY (E_Store_Key) REFERENCES E_Store(E_Store_Key),
	-- FOREIGN KEY (E_City_Key) REFERENCES E_City(E_City_Key)
-- );

-- create table E_Category
-- (
	-- E_Category_Key int NOT NULL,
	-- E_Category_Id nvarchar (256),
	-- E_Category_Name nvarchar (512),
	-- E_Category_Description nvarchar (1024),
	-- PRIMARY KEY (E_Category_Key),
-- );

-- create table E_Store_Categories
-- (
	-- E_Category_Key int NOT NULL,
	-- E_Store_Key int NOT NULL,
	-- E_Store_Category_Additional_Information nvarchar (2048),
	-- PRIMARY KEY (E_Category_Key, E_Store_Key),
	-- FOREIGN KEY (E_Store_Key) REFERENCES E_Store(E_Store_Key),
	-- FOREIGN KEY (E_Category_Key) REFERENCES E_Category(E_Category_Key)
-- );

-- */
 