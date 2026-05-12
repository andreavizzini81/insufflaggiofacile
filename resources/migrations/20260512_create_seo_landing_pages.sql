CREATE TABLE IF NOT EXISTS seo_landing_page (
 id INT AUTO_INCREMENT PRIMARY KEY,
 slug VARCHAR(120) NOT NULL UNIQUE,
 title VARCHAR(255) NOT NULL,
 meta_title VARCHAR(255) NOT NULL,
 meta_description TEXT,
 h1 VARCHAR(255) NOT NULL,
 intro_text TEXT,
 hero_cta_label VARCHAR(120) DEFAULT 'Richiedi un preventivo gratuito',
 hero_cta_url VARCHAR(255) DEFAULT '/richiedi-preventivo',
 main_content MEDIUMTEXT,
 sections_json MEDIUMTEXT,
 faq_json MEDIUMTEXT,
 structured_data_json MEDIUMTEXT,
 menu_group VARCHAR(80) DEFAULT 'Servizi',
 sort INT DEFAULT 0,
 is_visible TINYINT(1) DEFAULT 1,
 in_sitemap TINYINT(1) DEFAULT 1,
 robots VARCHAR(40) DEFAULT 'index, follow',
 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
 updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO seo_landing_page (slug,title,meta_title,meta_description,h1,intro_text,main_content,sections_json,faq_json,sort)
VALUES
('insufflaggio-cellulosa','Insufflaggio cellulosa in Sicilia | Isolamento termico casa','Insufflaggio cellulosa in Sicilia | Isolamento termico casa','Intervento di insufflaggio di cellulosa per case e appartamenti in Sicilia con sopralluogo tecnico e preventivo gratuito.','Insufflaggio di cellulosa per isolamento termico in Sicilia','Servizio commerciale dedicato a chi vuole migliorare comfort termico e ridurre dispersioni senza demolizioni invasive.','<p>L\'insufflaggio di cellulosa viene eseguito in pareti, intercapedini e sottotetti con fori tecnici puntuali e ripristino finale.</p><p>Scopri anche <a href="/isolamento-cellulosa">isolamento cellulosa</a>, <a href="/fibra-di-cellulosa-isolante">fibra di cellulosa isolante</a>, <a href="/insufflaggio-pareti">insufflaggio pareti</a> e <a href="/isolamento-termico-interno">isolamento termico interno</a>.</p>','[{"title":"Quando conviene","content":"<p>Conviene in presenza di intercapedini vuote, pareti fredde o surriscaldamento estivo.</p>"}]','[{"q":"Quanto dura un intervento?","a":"Da poche ore a uno-due giorni in base all\'immobile."},{"q":"Serve demolire?","a":"No, si lavora con piccoli fori tecnici poi ripristinati."},{"q":"Lavorate in Sicilia?","a":"Sì, in tutte le province siciliane."},{"q":"Posso richiedere un preventivo?","a":"Sì, tramite /richiedi-preventivo."}]',1),
('isolamento-cellulosa','Isolamento con cellulosa: vantaggi, applicazioni e preventivo','Isolamento con cellulosa: vantaggi, applicazioni e preventivo','Guida all\'isolamento con cellulosa: caratteristiche, applicazioni e differenze con altri materiali.','Isolamento con cellulosa per pareti, sottotetti e intercapedini','Pagina dedicata alla soluzione in cellulosa per comfort invernale ed estivo.','<p>La cellulosa è un materiale isolante in fiocchi adatto a intercapedini e sottotetti.</p><p>Confronto utile con lana di vetro e lana di roccia in funzione del caso reale.</p>','[]','[{"q":"La cellulosa è traspirante?","a":"Può favorire una buona gestione del vapore se il pacchetto è corretto."},{"q":"Aiuta in estate?","a":"Sì, può migliorare lo sfasamento termico."},{"q":"È adatta ai condomini?","a":"Spesso sì, previa verifica tecnica."},{"q":"Dove chiedere consulenza?","a":"Su /richiedi-preventivo."}]',2),
('fibra-di-cellulosa-isolante','Fibra di cellulosa isolante: cos’è e quando usarla','Fibra di cellulosa isolante: cos’è e quando usarla','Approfondimento tecnico-commerciale sulla fibra di cellulosa isolante per isolamento termoacustico.','Fibra di cellulosa isolante per isolamento termico e acustico','Approfondimento sul materiale e sui limiti realistici.','<p>La fibra di cellulosa isolante viene insufflata in cavità per creare uno strato continuo.</p>','[]','[{"q":"Isola anche dal rumore?","a":"Può attenuare parte dei rumori aerei, non sostituisce sistemi complessi."},{"q":"Ha limiti?","a":"Sì, dipende dalla stratigrafia e dai ponti acustici."},{"q":"È adatta a pareti esistenti?","a":"Spesso sì con intercapedine ispezionata."},{"q":"Fate sopralluogo?","a":"Sì."}]',3)
ON DUPLICATE KEY UPDATE title=VALUES(title), meta_title=VALUES(meta_title), meta_description=VALUES(meta_description), h1=VALUES(h1), intro_text=VALUES(intro_text), main_content=VALUES(main_content), sections_json=VALUES(sections_json), faq_json=VALUES(faq_json), sort=VALUES(sort);
