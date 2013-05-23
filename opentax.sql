--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: estados; Type: TABLE; Schema: public; Owner: johel; Tablespace: 
--

CREATE TABLE estados (
    id integer NOT NULL,
    estado text NOT NULL
);


ALTER TABLE public.estados OWNER TO johel;

--
-- Name: estados_id_seq; Type: SEQUENCE; Schema: public; Owner: johel
--

CREATE SEQUENCE estados_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.estados_id_seq OWNER TO johel;

--
-- Name: estados_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: johel
--

ALTER SEQUENCE estados_id_seq OWNED BY estados.id;


--
-- Name: municipios; Type: TABLE; Schema: public; Owner: johel; Tablespace: 
--

CREATE TABLE municipios (
    id integer NOT NULL,
    municipio text NOT NULL,
    estado_fkey integer NOT NULL
);


ALTER TABLE public.municipios OWNER TO johel;

--
-- Name: municipios_id_seq; Type: SEQUENCE; Schema: public; Owner: johel
--

CREATE SEQUENCE municipios_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.municipios_id_seq OWNER TO johel;

--
-- Name: municipios_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: johel
--

ALTER SEQUENCE municipios_id_seq OWNED BY municipios.id;


--
-- Name: parroquias; Type: TABLE; Schema: public; Owner: johel; Tablespace: 
--

CREATE TABLE parroquias (
    id integer NOT NULL,
    parroquia text NOT NULL,
    municipio_fkey integer NOT NULL
);


ALTER TABLE public.parroquias OWNER TO johel;

--
-- Name: parroquias_id_seq; Type: SEQUENCE; Schema: public; Owner: johel
--

CREATE SEQUENCE parroquias_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.parroquias_id_seq OWNER TO johel;

--
-- Name: parroquias_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: johel
--

ALTER SEQUENCE parroquias_id_seq OWNED BY parroquias.id;


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: johel
--

ALTER TABLE ONLY estados ALTER COLUMN id SET DEFAULT nextval('estados_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: johel
--

ALTER TABLE ONLY municipios ALTER COLUMN id SET DEFAULT nextval('municipios_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: johel
--

ALTER TABLE ONLY parroquias ALTER COLUMN id SET DEFAULT nextval('parroquias_id_seq'::regclass);


--
-- Data for Name: estados; Type: TABLE DATA; Schema: public; Owner: johel
--

COPY estados (id, estado) FROM stdin;
1	Amazonas
2	Anzoátegui
3	Apure
4	Aragua
5	Barinas
6	Bolívar
7	Carabobo
8	Cojedes
9	Delta Amacuro
10	Distrito Capital
11	Falcón
12	Guárico
13	Lara
14	Mérida
15	Miranda
16	Monagas
17	Nueva Esparta
18	Portuguesa
19	Sucre
20	Táchira
21	Trujillo
22	Yaracuy
23	Zulia
24	Vargas
\.


--
-- Name: estados_id_seq; Type: SEQUENCE SET; Schema: public; Owner: johel
--

SELECT pg_catalog.setval('estados_id_seq', 24, true);


--
-- Data for Name: municipios; Type: TABLE DATA; Schema: public; Owner: johel
--

COPY municipios (id, municipio, estado_fkey) FROM stdin;
1	Bejuma	7
2	Carlos Arvelo	7
3	Diego Ibarra	7
4	Guacara	7
5	Juan José Mora	7
6	Libertador	7
7	Los Guayos	7
8	Miranda	7
9	Montalbán	7
10	Naguanagua	7
11	Puerto Cabello	7
12	San Diego	7
13	San Joaquín	7
14	Valencia	7
\.


--
-- Name: municipios_id_seq; Type: SEQUENCE SET; Schema: public; Owner: johel
--

SELECT pg_catalog.setval('municipios_id_seq', 14, true);


--
-- Data for Name: parroquias; Type: TABLE DATA; Schema: public; Owner: johel
--

COPY parroquias (id, parroquia, municipio_fkey) FROM stdin;
\.


--
-- Name: parroquias_id_seq; Type: SEQUENCE SET; Schema: public; Owner: johel
--

SELECT pg_catalog.setval('parroquias_id_seq', 1, false);


--
-- Name: estados_estado_key; Type: CONSTRAINT; Schema: public; Owner: johel; Tablespace: 
--

ALTER TABLE ONLY estados
    ADD CONSTRAINT estados_estado_key UNIQUE (estado);


--
-- Name: estados_pkey; Type: CONSTRAINT; Schema: public; Owner: johel; Tablespace: 
--

ALTER TABLE ONLY estados
    ADD CONSTRAINT estados_pkey PRIMARY KEY (id);


--
-- Name: municipios_pkey; Type: CONSTRAINT; Schema: public; Owner: johel; Tablespace: 
--

ALTER TABLE ONLY municipios
    ADD CONSTRAINT municipios_pkey PRIMARY KEY (id);


--
-- Name: parroquias_pkey; Type: CONSTRAINT; Schema: public; Owner: johel; Tablespace: 
--

ALTER TABLE ONLY parroquias
    ADD CONSTRAINT parroquias_pkey PRIMARY KEY (id);


--
-- Name: municipios_estado_fkey_fkey; Type: FK CONSTRAINT; Schema: public; Owner: johel
--

ALTER TABLE ONLY municipios
    ADD CONSTRAINT municipios_estado_fkey_fkey FOREIGN KEY (estado_fkey) REFERENCES estados(id);


--
-- Name: parroquias_municipio_fkey_fkey; Type: FK CONSTRAINT; Schema: public; Owner: johel
--

ALTER TABLE ONLY parroquias
    ADD CONSTRAINT parroquias_municipio_fkey_fkey FOREIGN KEY (municipio_fkey) REFERENCES municipios(id);


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

