create table mod_type_exoneration(

    id bigint not null,
    libelle varchar(255) not null,
    label varchar(255) not null,
    ordre bigint not null,
    constraint pk_type_exoneration primary key (id)
);

create table mod_type_user(

    id bigint not null,
    libelle varchar(255) not null,
    label varchar(255) not null,
    ordre bigint not null,
    constraint pk_type_user primary key (id)
);

create table mod_type_domaine(

    id bigint not null,
    libelle varchar(255) not null,
    label varchar(255) not null,
    ordre bigint not null,
    constraint pk_type_domaine primary key (id)
);


create table consommation(

    id bigint not null,
    quantite_consommee decimal not null,
    annee_deb timestamp without time zone not null,
    annee_fin timestamp without time zone not null,
    constraint pk_consommation primary key (id)
);

create table article(

    id bigint not null,
    titre varchar(255) not null,
    url varchar(255) not null,
    date timestamp without time zone not null,
	auteur varchar(255),
	categorie bigint,
	commentaire text,
	description text, 
	date_publication timestamp without time zone,
	date_derniere_modification timestamp without time zone,
	
    constraint pk_article primary key (id),
	constraint fk_categorie_article foreign key (categorie) references  mod_type_domaine(id)
);

create table ville (
	id bigint not null,
	nom varchar(255) not null,
	code_postal varchar(255),
	
	constraint pk_ville primary key (id)
);
create table utilisateur(

    id bigint not null,
    nom varchar(255) not null,
	prenom varchar(255) not null,
	adresse varchar(255) not null,
	code_postal varchar(255) not null,
	ville ville,
	mail varchar(255) not null,
	telephone varchar(255),
	application_mobile boolean not null,
	date_creation timestamp without time zone not null,
	type_user bigint not null,
    
    constraint pk_utilisateur primary key (id)
);

create table fiche_conseil(

    id bigint not null,
    contenu text not null,
	description text not null,
	domaine bigint not null,
	
    
    constraint pk_fiche_conseil primary key (id)
);





