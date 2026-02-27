-- ============================================
-- Vivek Sharma Portfolio - Database Setup
-- Run this in phpMyAdmin → SQL tab
-- ============================================

-- Step 1: Create the database
CREATE DATABASE IF NOT EXISTS portfolio_db
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE portfolio_db;

-- Step 2: Create contact messages table
CREATE TABLE IF NOT EXISTS contact_messages (
    id          INT AUTO_INCREMENT PRIMARY KEY,
    name        VARCHAR(100)  NOT NULL,
    email       VARCHAR(150)  NOT NULL,
    message     TEXT          NOT NULL,
    ip_address  VARCHAR(45)   DEFAULT NULL,
    is_read     TINYINT(1)    DEFAULT 0,
    created_at  DATETIME      DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
