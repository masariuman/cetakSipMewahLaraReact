import React, { Component } from "react";
import { NavLink, Link } from "react-router-dom";
import axios from "axios";

class MobileMenu extends Component {
    constructor(props) {
        super(props);
        this.state = {
            uuzaaMei: "",
            reberu: "",
            sashin: "",
            level: "",
        };
        this.renderSashin = this.renderSashin.bind(this);
        this.renderLegendDashboard = this.renderLegendDashboard.bind(this);
        this.renderLegendMenu = this.renderLegendMenu.bind(this);
        this.renderLegendMenu2 = this.renderLegendMenu2.bind(this);
        this.noNav = this.noNav.bind(this);
    }

    noNav(e) {
        e.preventDefault();
    }


    getUuzaa() {
        // axios.get("/getUuzaa").then((response) => {
        //     this.setState({
        //         uuzaaMei: response.data.data.name,
        //         reberu: response.data.data.level,
        //         sashin: response.data.data.sashin,
        //         rinku: response.data.data.rinku,
        //         level: response.data.data.reberu
        //     });
        // });
    }

    componentDidMount() {
        this.getUuzaa();
    }

    renderSashin() {
        return !this.state.sashin || this.state.sashin === "" ? <img alt="" src="/warudo/dist/img/avatar.jpg" /> : <img alt="" src={"/sashin/"+this.state.sashin} />;
    }

    renderLegendDashboard() {
        return this.state.level === "0" ?
                        <li>
                            <NavLink
                                exact="true"
                                className={isActive =>
                                    "masariuman-active" + (!isActive ? " unselected" : "")
                                }
                                to={`/aadmin`}
                            >
                                <div className="icon-w">
                                    <div className="os-icon os-icon-layers"></div>
                                </div>
                                <span>Dashboard Admin</span>
                            </NavLink>
                        </li>
        : <li></li>;
    }

    renderLegendMenu2() {
        return this.state.level === "0" ?
                        <li>
                            <NavLink
                                exact="true"
                                className={isActive =>
                                    "masariuman-active" + (!isActive ? " unselected" : "")
                                }
                                to={`/peremajaanData`}
                            >
                                <div className="icon-w">
                                    <div className="os-icon os-icon-users"></div>
                                </div>
                                <span>Input / Update Data Pegawai</span>
                            </NavLink>
                        </li>
        : <li></li>;
    }

    renderLegendMenu() {
        return this.state.level === "0" ?
            <li className="has-sub-menu">
                <NavLink
                    onClick={this.noNav}
                    className={isActive =>
                        "masariuman-adminActive" + (!isActive ? " unselected" : "")
                    }
                    to={`/admin/referensi`}
                >
                    <div className="icon-w">
                        <div className="os-icon os-icon-cv-2"></div>
                    </div>
                    <span>Referensi</span>
                </NavLink>
                        <ul className="sub-menu">
                            <li>
                                <Link to={`/admin/referensi/kategoriArsip`}>
                                    <i className="os-icon os-icon-grid"></i> &nbsp;&nbsp;&nbsp;Kategori Arsip
                                </Link>
                            </li>
                            <li>
                                <Link to={`/admin/referensi/agama`}>
                                    <i className="os-icon os-icon-users"></i> &nbsp;&nbsp;&nbsp;Agama
                                </Link>
                            </li>
                            <li>
                                <Link to={`/admin/referensi/unor`}>
                                    <i className="fa fa-sitemap"></i> &nbsp;&nbsp;&nbsp;Unit Organisasi
                                </Link>
                            </li>
                            <li>
                                <Link to={`/admin/referensi/bidang`}>
                                    <i className="os-icon os-icon-home"></i> &nbsp;&nbsp;&nbsp;Bidang
                                </Link>
                            </li>
                            <li>
                                <Link to={`/admin/referensi/subBidang`}>
                                    <i className="os-icon os-icon-hierarchy-structure-2"></i> &nbsp;&nbsp;&nbsp;Sub Bidang
                                </Link>
                            </li>
                            <li>
                                <Link to={`/admin/referensi/statusKepegawaian`}>
                                    <i className="os-icon os-icon-users"></i> &nbsp;&nbsp;&nbsp;Status Kepegawaian
                                </Link>
                            </li>
                            <li>
                                <Link to={`/admin/referensi/kedudukanKepegawaian`}>
                                    <i className="os-icon os-icon-cv-2"></i> &nbsp;&nbsp;&nbsp;Kedudukan Kepegawaian
                                </Link>
                            </li>
                            <li>
                                <Link to={`/admin/referensi/jenisKepegawaian`}>
                                    <i className="os-icon os-icon-cv-2"></i> &nbsp;&nbsp;&nbsp;Jenis Kepegawaian
                                </Link>
                            </li>
                            <li>
                                <Link to={`/admin/referensi/jenisHukumanDisiplin`}>
                                    <i className="os-icon os-icon-alert-triangle"></i> &nbsp;&nbsp;&nbsp;Jenis Hukuman Disiplin
                                </Link>
                            </li>
                            <li>
                                <Link to={`/admin/referensi/jenisPenghargaan`}>
                                    <i className="os-icon os-icon-award"></i> &nbsp;&nbsp;&nbsp;Jenis Penghargaan
                                </Link>
                            </li>
                        </ul>

                        <ul className="sub-menu">
                            <li>
                                <Link to={`/admin/referensi/pangkatGolonganRuang`}>
                                    <i className="fa fa-star"></i> &nbsp;&nbsp;&nbsp;Pangkat / Golongan Ruang
                                </Link>
                            </li>
                            <li>
                                <Link to={`/admin/referensi/stlud`}>
                                    <i className="os-icon os-icon-bookmark"></i> &nbsp;&nbsp;&nbsp;STLUD
                                </Link>
                            </li>
                            <li>
                                <Link to={`/admin/referensi/jenisNaikPangkat`}>
                                    <i className="fa fa-star-o"></i> &nbsp;&nbsp;&nbsp;Jenis Naik Pangkat
                                </Link>
                            </li>
                        </ul>

                        <ul className="sub-menu">
                            <li>
                                <Link to={`/admin/referensi/tingkatPendidikan`}>
                                    <i className="fa fa-university"></i> &nbsp;&nbsp;&nbsp;Tingkat Pendidikan
                                </Link>
                            </li>
                            <li>
                                <Link to={`/admin/referensi/jurusanPendidikan`}>
                                    <i className="fa fa-graduation-cap"></i> &nbsp;&nbsp;&nbsp;Jurusan Pendidikan
                                </Link>
                            </li>
                            <li>
                                <Link to={`/admin/referensi/diklatStruktural`}>
                                    <i className="fa fa-usb"></i> &nbsp;&nbsp;&nbsp;Diklat Struktural
                                </Link>
                            </li>
                            <li>
                                <Link to={`/admin/referensi/diklatFungsional`}>
                                    <i className="fa fa-usb"></i> &nbsp;&nbsp;&nbsp;Diklat Fungsional
                                </Link>
                            </li>
                            <li>
                                <Link to={`/admin/referensi/diklatTeknis`}>
                                    <i className="fa fa-usb"></i> &nbsp;&nbsp;&nbsp;Diklat Teknis
                                </Link>
                            </li>
                        </ul>

                        <ul className="sub-menu">
                            <li>
                                <Link to={`/admin/referensi/jabatanFungsionalTertentu`}>
                                    <i className="os-icon os-icon-trending-up"></i> &nbsp;&nbsp;&nbsp;Jabatan Fungsional Umum
                                </Link>
                            </li>
                            <li>
                                <Link to={`/jabatan`}>
                                    <i className="os-icon os-icon-trending-up"></i> &nbsp;&nbsp;&nbsp;Jabatan Fungsional Tertentu
                                </Link>
                            </li>
                            <li>
                                <Link to={`/admin/referensi/jabatanKorpri`}>
                                    <i className="os-icon os-icon-trending-up"></i> &nbsp;&nbsp;&nbsp;Jabatan KORPRI
                                </Link>
                            </li>
                            <li>
                                <Link to={`/admin/referensi/eselonJabatan`}>
                                    <i className="os-icon os-icon-trending-up"></i> &nbsp;&nbsp;&nbsp;Eselon Jabatan
                                </Link>
                            </li>
                            <li>
                                <Link to={`/admin/referensi/jenisJabatan`}>
                                    <i className="os-icon os-icon-trending-up"></i> &nbsp;&nbsp;&nbsp;Jenis Jabatan
                                </Link>
                            </li>
                            <li>
                                <Link to={`/admin/referensi/pejabatPenetap`}>
                                    <i className="fa fa-user-secret"></i> &nbsp;&nbsp;&nbsp;Pejabat Penetap
                                </Link>
                            </li>
                            <li>
                                <Link to={`/admin/referensi/pejabatNegara`}>
                                    <i className="fa fa-user-secret"></i> &nbsp;&nbsp;&nbsp;Pejabat Negara
                                </Link>
                            </li>
                        </ul>
            </li>
        : <li></li>;
    }

    render() {
        return (
            <div className="menu-mobile menu-activated-on-click color-scheme-dark">
                <div className="mm-logo-buttons-w">
                    <a className="mm-logo">
                        <img src="/warudo/dist/img/logo.png" />
                        <span>{this.state.uuzaaMei}</span>
                    </a>
                    <div className="mm-buttons">
                        <div className="mobile-menu-trigger">
                            <div className="os-icon os-icon-hamburger-menu-1"></div>
                        </div>
                    </div>
                </div>
                <div className="menu-and-user">
                    <div className="logged-user-w">
                        <div className="avatar-w">
                            {this.renderSashin()}
                        </div>
                        <div className="logged-user-info-w">
                            <div className="logged-user-name">
                                {this.state.uuzaaMei}
                            </div>
                            <div className="logged-user-role">
                                {this.state.reberu}
                            </div>
                        </div>
                    </div>
                    {/* START - Mobile Menu List */}
                    <ul className="main-menu">
                        <li>
                            <NavLink
                                exact="true"
                                className={isActive =>
                                    "masariuman-active" + (!isActive ? " unselected" : "")
                                }
                                to={`/`}
                            >
                                <div className="icon-w">
                                    <div className="os-icon os-icon-layout"></div>
                                </div>
                                <span>Dashboard</span>
                            </NavLink>
                        </li>
                        <li className="has-sub-menu">
                            <NavLink
                                className={isActive =>
                                    "masariuman-active" + (!isActive ? " unselected" : "")
                                }
                                to={`/identitasPegawai`}
                            >
                                <div className="icon-w">
                                    <div className="os-icon os-icon-cv-2"></div>
                                </div>
                                <span>Data Pegawai</span>
                            </NavLink>
                                    <ul className="sub-menu">
                                        <li>
                                            <Link to={`/identitasPegawai`}>
                                                <i className="os-icon os-icon-cv-2"></i> &nbsp;&nbsp;&nbsp;Identitas Pegawai
                                            </Link>
                                        </li>
                                        <li>
                                            <Link to={`/pangkat`}>
                                                <i className="fa fa-star"></i> &nbsp;&nbsp;&nbsp;Pangkat
                                            </Link>
                                        </li>
                                    </ul>
                                    <ul className="sub-menu">
                                        <li>
                                            <Link to={`/pns`}>
                                                <i className="fa fa-odnoklassniki"></i> &nbsp;&nbsp;&nbsp;Data CPNS / PNS
                                            </Link>
                                        </li>
                                        <li>
                                            <Link to={`/jabatan`}>
                                                <i className="fa fa-line-chart"></i> &nbsp;&nbsp;&nbsp;Jabatan
                                            </Link>
                                        </li>
                                    </ul>
                        </li>
                        <li>
                            <a href="/arsip">
                                <div className="icon-w">
                                    <div className="os-icon os-icon-agenda-1"></div>
                                </div>
                                <span>Arsip</span>
                            </a>
                        </li>
                        <li>
                            <a href="/pengajuan">
                                <div className="icon-w">
                                    <div className="os-icon os-icon-email-forward"></div>
                                </div>
                                <span>Pengajuan Data Baru / perubahan Data</span>
                            </a>
                        </li>
                        {this.renderLegendDashboard()}
                        {this.renderLegendMenu2()}
                        {this.renderLegendMenu()}
                        <li>
                            <a href="/logout">
                                <div className="icon-w">
                                    <div className="os-icon os-icon-signs-11"></div>
                                </div>
                                <span>Logout</span>
                            </a>
                        </li>
                    </ul>
                    {/* END - Mobile Menu List */}
                    {/* <div className="mobile-menu-magic">
                        <h4>
                            Light Admin
                        </h4>
                        <p>
                            Clean Bootstrap 4 Template
                        </p>
                        <div className="btn-w">
                            <a className="btn btn-white btn-rounded" href="https://themeforest.net/item/light-admin-clean-bootstrap-dashboard-html-template/19760124?ref=Osetin" target="_blank">Purchase Now</a>
                        </div>
                    </div> */}
                </div>
            {/* END - Mobile Menu */}
            </div>
        );
    }
}

export default MobileMenu;
