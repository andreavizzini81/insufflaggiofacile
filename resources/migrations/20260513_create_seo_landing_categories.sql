CREATE TABLE IF NOT EXISTS seo_landing_category (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  slug VARCHAR(255) NOT NULL UNIQUE,
  description TEXT NULL,
  menu_label VARCHAR(255) NULL,
  sort INT DEFAULT 0,
  is_visible TINYINT(1) DEFAULT 1,
  show_in_services_menu TINYINT(1) DEFAULT 1,
  created_at DATETIME NULL,
  updated_at DATETIME NULL
);
ALTER TABLE seo_landing_page ADD COLUMN IF NOT EXISTS category_id INT NULL;
ALTER TABLE seo_landing_page ADD COLUMN IF NOT EXISTS menu_label VARCHAR(255) NULL;
ALTER TABLE seo_landing_page ADD COLUMN IF NOT EXISTS show_in_services_menu TINYINT(1) DEFAULT 1;
ALTER TABLE seo_landing_page ADD COLUMN IF NOT EXISTS show_related_pages TINYINT(1) DEFAULT 1;
ALTER TABLE seo_landing_page ADD COLUMN IF NOT EXISTS sort INT DEFAULT 0;
CREATE INDEX IF NOT EXISTS idx_seo_landing_page_category_id ON seo_landing_page(category_id);
CREATE INDEX IF NOT EXISTS idx_seo_landing_page_vis_menu_sort ON seo_landing_page(is_visible,show_in_services_menu,sort);
CREATE INDEX IF NOT EXISTS idx_seo_landing_page_cat_vis_sort ON seo_landing_page(category_id,is_visible,sort);

INSERT INTO seo_landing_category (name,slug,description,sort,is_visible,show_in_services_menu) VALUES
('Insufflaggio e cellulosa','insufflaggio-cellulosa','pagine dedicate all’insufflaggio con cellulosa, all’isolamento con cellulosa e alla fibra di cellulosa isolante.',10,1,1),
('Isolamento termico casa','isolamento-termico-casa','pagine dedicate all’isolamento termico dell’abitazione, all’isolamento interno e alle soluzioni senza cappotto esterno.',20,1,1),
('Insufflaggio pareti e coibentazione','insufflaggio-pareti-coibentazione','pagine dedicate all’insufflaggio delle pareti, alle intercapedini e alla coibentazione delle pareti.',30,1,1),
('Isolamento acustico e termoacustico','isolamento-acustico-termoacustico','pagine dedicate al miglioramento del comfort acustico e termoacustico delle pareti.',40,1,1),
('Problemi casa: umidità, muffa e pareti fredde','umidita-muffa-pareti-fredde','pagine dedicate ai problemi di umidità, muffa, condensa e pareti fredde, spiegando quando l’isolamento può aiutare e quando serve una verifica tecnica.',50,1,1),
('Materiali isolanti','materiali-isolanti','pagine dedicate alla scelta dei materiali isolanti termici per pareti, intercapedini e casa.',60,1,1)
ON DUPLICATE KEY UPDATE name=VALUES(name),description=VALUES(description),sort=VALUES(sort);

UPDATE seo_landing_page p JOIN seo_landing_category c ON c.slug='insufflaggio-cellulosa' SET p.category_id=c.id WHERE p.slug IN ('insufflaggio-cellulosa','isolamento-cellulosa','fibra-di-cellulosa-isolante');
UPDATE seo_landing_page p JOIN seo_landing_category c ON c.slug='isolamento-termico-casa' SET p.category_id=c.id WHERE p.slug IN ('isolamento-termico-casa','isolamento-termico-interno');
UPDATE seo_landing_page p JOIN seo_landing_category c ON c.slug='insufflaggio-pareti-coibentazione' SET p.category_id=c.id WHERE p.slug IN ('insufflaggio-pareti');
UPDATE seo_landing_page p JOIN seo_landing_category c ON c.slug='isolamento-acustico-termoacustico' SET p.category_id=c.id WHERE p.slug IN ('isolamento-acustico-pareti');
UPDATE seo_landing_page p JOIN seo_landing_category c ON c.slug='umidita-muffa-pareti-fredde' SET p.category_id=c.id WHERE p.slug IN ('umidita-casa-muffa-pareti');
UPDATE seo_landing_page p JOIN seo_landing_category c ON c.slug='materiali-isolanti' SET p.category_id=c.id WHERE p.slug IN ('materiale-isolante-termico');
