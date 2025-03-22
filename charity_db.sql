CREATE DATABASE IF NOT EXISTS charity_db;
USE charity_db;

-- جدول المستخدمين
CREATE TABLE Users (
    UserID INT PRIMARY KEY AUTO_INCREMENT,
    Name VARCHAR(100),
    Email VARCHAR(100) UNIQUE,
    Password VARCHAR(255),
    Role ENUM('Admin', 'Accountant', 'ProjectManager', 'Volunteer', 'Beneficiary', 'Donor'),
    Status ENUM('Active', 'Inactive') DEFAULT 'Active',
    CreatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- جدول المتبرعين
CREATE TABLE Donors (
    DonorID INT PRIMARY KEY AUTO_INCREMENT,
    UserID INT,
    Phone VARCHAR(20),
    Address TEXT,
    ProfilePicture VARCHAR(255),
    FOREIGN KEY (UserID) REFERENCES Users(UserID)
);

-- جدول المستفيدين
CREATE TABLE Beneficiaries (
    BeneficiaryID INT PRIMARY KEY AUTO_INCREMENT,
    UserID INT,
    Age INT,
    Gender ENUM('Male', 'Female', 'Other'),
    DisabilityType ENUM('Physical', 'Visual', 'Hearing', 'Intellectual', 'Multiple'),
    SupportLevel ENUM('Low', 'Medium', 'High'),
    Needs TEXT,
    ProfilePicture VARCHAR(255),
    MedicalDocuments VARCHAR(255),
    FOREIGN KEY (UserID) REFERENCES Users(UserID)
);

-- جدول التبرعات
CREATE TABLE Donations (
    DonationID INT PRIMARY KEY AUTO_INCREMENT,
    DonorID INT,
    Amount DECIMAL(10, 2),
    Date DATE,
    Type ENUM('Cash', 'InKind') DEFAULT 'Cash',
    Description TEXT,
    FinancialAttachment VARCHAR(255),
    FOREIGN KEY (DonorID) REFERENCES Donors(DonorID)
);

-- جدول المشاريع
CREATE TABLE Projects (
    ProjectID INT PRIMARY KEY AUTO_INCREMENT,
    Title VARCHAR(100),
    Description TEXT,
    StartDate DATE,
    EndDate DATE,
    Budget DECIMAL(10, 2),
    Status ENUM('Ongoing', 'Completed', 'Paused') DEFAULT 'Ongoing'
);

-- جدول الحسابات المحاسبية
CREATE TABLE Accounts (
    AccountID INT PRIMARY KEY AUTO_INCREMENT,
    AccountName VARCHAR(100),
    AccountType ENUM('Asset', 'Liability', 'Revenue', 'Expense', 'Equity'),
    Balance DECIMAL(10, 2) DEFAULT 0
);

-- جدول القيد اليومي
CREATE TABLE JournalEntries (
    EntryID INT PRIMARY KEY AUTO_INCREMENT,
    Date DATE,
    Description TEXT,
    DebitAccountID INT,
    CreditAccountID INT,
    Amount DECIMAL(10, 2),
    FOREIGN KEY (DebitAccountID) REFERENCES Accounts(AccountID),
    FOREIGN KEY (CreditAccountID) REFERENCES Accounts(AccountID)
);