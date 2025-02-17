<?= $this->extend('template-user/landing-page-layout/page_layout') ?>

<!-- Header Content -->
<?= $this->section('header') ?>
    <?= $this->include('template-user/company-profile-layout/header_compro') ?>
<?= $this->endSection() ?>

<!-- Main Content -->
<?= $this->section('content') ?>
    <?= $this->include('template-user/company-profile-layout/section_one') ?>
    <?= $this->include('template-user/company-profile-layout/section_two') ?>
<?= $this->endSection() ?>
