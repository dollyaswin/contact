CREATE TABLE `contact_domain` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `domain_name` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`)
);

ALTER TABLE `contact`
ADD COLUMN `contact_domain_id` INT(11) UNSIGNED NULL DEFAULT NULL AFTER `phone`,
ADD INDEX `fk_contact_domain_idx` (`contact_domain_id` ASC);

ALTER TABLE `contact`
ADD CONSTRAINT `fk_contact_domain`
  FOREIGN KEY (`contact_domain_id`)
  REFERENCES `contact_domain` (`id`)
  ON DELETE SET NULL
  ON UPDATE CASCADE;

