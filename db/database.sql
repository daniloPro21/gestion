/* 
 * Copyright (C) 2016 trigger
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * db/database.sql
 *
 * Author:  trigger
 * Created: Dec 17, 2016
 *
 * Creation of database
 */

-- CREATE THE DATABASE
CREATE DATABASE IF NOT EXISTS gestdb;

-- CREATE USER
GRANT ALL PRIVILEGES
ON gestdb.*
TO 'dani'@'localhost'
IDENTIFIED BY 'password';

-- CONNEXION TO DATABASE
use gestdb;
