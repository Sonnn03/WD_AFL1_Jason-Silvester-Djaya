<?php

include("model.php");
session_start(); //memulai session

//create session member list if not exist
if (!isset($_SESSION['memberList'])) {
    $_SESSION['memberList'] = array();
}

//create session office list if not exist
if (!isset($_SESSION['officeList'])) {
    $_SESSION['officeList'] = array();
}

/* ---------- EMPLOYEE ---------- */

function createMember()
{
    $member = new model();
    $member->name = $_POST['inputName'];
    $member->jabatan = $_POST['inputJabatan'];
    $member->usia = (int) $_POST['inputUsia'];
    array_push($_SESSION['memberList'], $member);
}

function updateMember($memberID)
{
    $member = $_SESSION['memberList'][$memberID]; // ambil data dengan index tertentu
    $member->name = $_POST['inputName'];
    $member->jabatan = $_POST['inputJabatan'];
    $member->usia = (int) $_POST['inputUsia'];
}

function getAllMembers()
{
    return $_SESSION['memberList'];
}

function deleteMember($memberIndex)
{
    unset($_SESSION['memberList'][$memberIndex]); // array index = 0, 1, 2
}

function getMemberWithID($memberID)
{
    return $_SESSION['memberList'][$memberID];
}

/* ---------- OFFICE ---------- */

function createOffice()
{
    $office = new Office();
    $office->name = $_POST['inputOfficeName'];
    $office->address = $_POST['inputAddress'];
    $office->city = $_POST['inputCity'];
    $office->phone = $_POST['inputPhone'];
    array_push($_SESSION['officeList'], $office);
}

function getAllOffices()
{
    return $_SESSION['officeList'];
}

function deleteOffice($officeIndex)
{
    unset($_SESSION['officeList'][$officeIndex]);
}

/* ---------- HANDLER ---------- */

//jika button_register di klik
if (isset($_POST['button_register'])) {
    createMember();
    header("Location: view.php"); // kembali ke halaman lain
}

//jika button_delete di klik
if (isset($_GET['deleteID'])) {
    deleteMember($_GET['deleteID']);
    header("Location: view.php"); // kembali ke halaman lain
}

//jika button_update di klik
if (isset($_POST['button_update'])) {
    updateMember($_POST['input_id']);
    header("Location: view.php"); // kembali ke halaman lain
}

//jika button_register_office di klik
if (isset($_POST['button_register_office'])) {
    createOffice();
    header("Location: viewoffice.php");
}

//jika delete office di klik
if (isset($_GET['deleteOfficeID'])) {
    deleteOffice($_GET['deleteOfficeID']);
    header("Location: viewoffice.php");
}