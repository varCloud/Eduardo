SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';


-- -----------------------------------------------------
-- Table `Productos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Productos` (
  `idProducto` INT NOT NULL AUTO_INCREMENT ,
  `description` VARCHAR(250) NULL ,
  PRIMARY KEY (`idProducto`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SubProductos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `SubProductos` (
  `idSubProducto` INT NOT NULL AUTO_INCREMENT ,
  `idProducto` INT NOT NULL ,
  `descripcion` VARCHAR(250) NULL ,
  PRIMARY KEY (`idSubProducto`, `idProducto`) ,
  INDEX `fk_SubProductos_Productos_idx` (`idProducto` ASC) ,
  CONSTRAINT `fk_SubProductos_Productos`
    FOREIGN KEY (`idProducto` )
    REFERENCES `Productos` (`idProducto` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CatSubProductos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `CatSubProductos` (
  `idCatSubProducto` INT NOT NULL AUTO_INCREMENT ,
  `idSubProducto` INT NOT NULL ,
  `idProducto` INT NOT NULL ,
  `descripcion` VARCHAR(250) NULL ,
  `imagen` VARCHAR(250) NULL ,
  PRIMARY KEY (`idCatSubProducto`, `idSubProducto`, `idProducto`) ,
  INDEX `fk_CatSubProductos_SubProductos1_idx` (`idSubProducto` ASC, `idProducto` ASC) ,
  CONSTRAINT `fk_CatSubProductos_SubProductos1`
    FOREIGN KEY (`idSubProducto` , `idProducto` )
    REFERENCES `SubProductos` (`idSubProducto` , `idProducto` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Informacion`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Informacion` (
  `idInformacion` INT NOT NULL AUTO_INCREMENT ,
  `mision` VARCHAR(1000) NULL ,
  `vision` VARCHAR(1000) NULL ,
  PRIMARY KEY (`idInformacion`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Direccion`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Direccion` (
  `idDireccion` INT NOT NULL AUTO_INCREMENT ,
  `colonia` VARCHAR(45) NULL ,
  `calle` VARCHAR(45) NULL ,
  `noInterior` VARCHAR(45) NULL ,
  `noExterior` VARCHAR(45) NULL ,
  `codigoPostal` VARCHAR(45) NULL ,
  `estado` VARCHAR(45) NULL ,
  `Pais` VARCHAR(45) NULL ,
  `Telefono1` VARCHAR(45) NULL ,
  `telefono2` VARCHAR(45) NULL ,
  `informacionExtra` VARCHAR(45) NULL ,
  PRIMARY KEY (`idDireccion`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CatSliders`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `CatSliders` (
  `idCatSliders` INT NOT NULL ,
  `img` VARCHAR(1000) NULL ,
  PRIMARY KEY (`idCatSliders`) )
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
