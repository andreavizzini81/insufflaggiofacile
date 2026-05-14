ALTER TABLE `product`
    ADD COLUMN `sections_json` LONGTEXT NULL AFTER `description`,
    ADD COLUMN `faq_json` LONGTEXT NULL AFTER `sections_json`,
    ADD COLUMN `structured_data_json` LONGTEXT NULL AFTER `faq_json`;

ALTER TABLE `static_page`
    ADD COLUMN `sections_json` LONGTEXT NULL AFTER `description`,
    ADD COLUMN `faq_json` LONGTEXT NULL AFTER `sections_json`,
    ADD COLUMN `structured_data_json` LONGTEXT NULL AFTER `faq_json`;
