import React, { Component } from "react";
import Footer from "../layout/Footer";
import DarkMode from "../layout/DarkMode";
import Loading from "../layout/Loading";
import swal from 'sweetalert2';
import Pagination from "react-js-pagination";
import axios from "axios";


class Keluarga extends Component {
    constructor(props) {
        super(props);
        this.state = {
            jafung: [],
            create: "",
            jafungEditInput: "",
            cari: "",
            url: null,
            loading: false
        };
        this.handleChange = this.handleChange.bind(this);
        this.handleEditInputChange = this.handleEditInputChange.bind(this);
        this.handleEditSubmit = this.handleEditSubmit.bind(this);
        this.handleSubmit = this.handleSubmit.bind(this);
        this.renderJafung = this.renderJafung.bind(this);
        this.handlePageChange = this.handlePageChange.bind(this);
        this.modalTambah = this.modalTambah.bind(this);
        this.modalUbah = this.modalUbah.bind(this);
        this.handleChangeCari = this.handleChangeCari.bind(this);
    }

    handleChangeCari(e) {
        // this.setState({
        //     cari: e.target.value
        // });
        // axios
        //     .post(`/masariuman_tag/search`, {
        //         cari: e.target.value
        //     })
        //     .then(response => {
        //         // console.log(response.data);
        //         this.setState({
        //             jafung: response.data.deeta_tag.data,
        //             loading: false,
        //             activePage: response.data.deeta_tag.current_page,
        //             itemsCountPerPage: response.data.deeta_tag.per_page,
        //             totalItemsCount: response.data.deeta_tag.total,
        //             pageRangeDisplayed: 10
        //         });
        //         // console.log(this.state.jafung);
        //     });
    }

    handleDeleteButton(e) {
        // axios
        //     .get(`/masariuman_tag/${e}`)
        //     .then(response => {
        //         swal({
        //             title: `Yakin ingin menghapus jafung ${response.data.deeta_tag.jafung}`,
        //             text: "Kalau Terhapus, Hubungi Admin Untuk Mengembalikan Data yang Terhapus!",
        //             icon: "warning",
        //             buttons: true,
        //             dangerMode: true,
        //           })
        //           .then((willDelete) => {
        //             if (willDelete) {
        //                 this.setState({
        //                     loading: true
        //                 });
        //                 axios
        //                     .delete(`/masariuman_tag/${e}`, {
        //                         url: this.state.url
        //                     })
        //                     .then(response => {
        //                         this.setState({
        //                             jafung: response.data.deeta_tag.data,
        //                             loading: false
        //                         });
        //                         swal("Sukses!", "Data Berhasil Dihapus!", "success");
        //                         // console.log("from handle sumit", response);
        //                     })
        //                     .catch(error => {
        //                         this.setState({
        //                             loading: false
        //                         });
        //                         swal("Error!", "Gagal Menghapus Data, Silahkan Hubungi Admin!", "error");
        //                     });
        //             } else {
        //               swal("Data Tidak Terhapus!");
        //             }
        //           });
        //     })
        //     .catch(error => {
        //         swal("Error!", "Terdapat Masalah, Silahkan Hubungi Admin!", "error");
        //     });
    }

    handleEditButton(e) {
        // axios
        //     .get(`/masariuman_tag/${e}`)
        //     .then(response => {
        //         this.setState({
        //             jafungEditInput: response.data.deeta_tag.jafung,
        //             url: response.data.deeta_tag.url
        //         });
        //     })
        //     .catch(error => {
        //         swal("Error!", "Terdapat Masalah, Silahkan Hubungi Admin!", "error");
        //     });
    }

    handleChange(e) {
        this.setState({
            create: e.target.value
        });
        // console.log(e.target.value);
    }

    handleEditInputChange(e) {
        this.setState({
            jafungEditInput: e.target.value
        });
        // console.log(e.target.value);
    }

    handleSubmit(e) {
        // e.preventDefault();
        // this.setState({
        //     loading: true
        // });
        // axios
        //     .post("/masariuman_tag", {
        //         create: this.state.create
        //     })
        //     .then(response => {
        //         this.setState({
        //             jafung: [response.data.deeta_tag, ...this.state.jafung],
        //             create: "",
        //             loading: false
        //         });
        //         $("#tambahModal").removeClass("in");
        //         $(".modal-backdrop").remove();
        //         $('body').removeClass('modal-open');
        //         $('body').css('padding-right', '');
        //         $("#tambahModal").hide();
        //         swal("Sukses!", "Data Baru Berhasil Ditambahkan!", "success");
        //         // console.log("from handle sumit", response);
        //     })
        //     .catch(error => {
        //         this.setState({
        //             loading: false
        //         });
        //         swal("Error!", "Gagal Memasukkan Data Baru, Silahkan Hubungi Admin!", "error");
        //     });
        // // console.log(this.state.create);
    }

    handleEditSubmit(e) {
        // e.preventDefault();
        // this.setState({
        //     loading: true
        // });
        // axios
        //     .put(`/masariuman_tag/${this.state.url}`, {
        //         content: this.state.jafungEditInput
        //     })
        //     .then(response => {
        //         this.setState({
        //             jafung: response.data.deeta_tag.data,
        //             jafungEditInput: "",
        //             loading: false
        //         });
        //         $("#editModal").removeClass("in");
        //         $(".modal-backdrop").remove();
        //         $('body').removeClass('modal-open');
        //         $('body').css('padding-right', '');
        //         $("#editModal").hide();
        //         swal("Sukses!", "Data Berhasil Diubah!", "success");
        //         // console.log("from handle sumit", response);
        //     })
        //     .catch(error => {
        //         this.setState({
        //             loading: false
        //         });
        //         swal("Error!", "Gagal Mengubah Data, Silahkan Hubungi Admin!", "error");
        //     });
        // // console.log(this.state.create);
    }

    getRefJafung() {
        this.setState({
            loading: true
        });
        axios
            .get("http://127.0.0.1:8877/v1/referensi/jafung")
            .then(response => {
                this.setState({
                    jafung: response.data.data,
                    loading: false,
                    activePage: response.data.current_page,
                    itemsCountPerPage: response.data.per_page,
                    totalItemsCount: response.data.total,
                    pageRangeDisplayed: 10
                });
            })
            .catch(error => {
                swal.fire("Error!", "Terdapat Masalah, Silahkan Hubungi Admin!", "error");
                this.setState({loading: false});
            });
    }

    handlePageChange(pageNumber) {
        this.setState({
            loading: true
        });
        axios
            .get('http://127.0.0.1:8877/v1/referensi/jafung?page='+pageNumber)
            .then(response => {
                this.setState({
                    jafung: response.data.data,
                    loading: false,
                    activePage: response.data.current_page,
                    itemsCountPerPage: response.data.per_page,
                    totalItemsCount: response.data.total,
                    pageRangeDisplayed: 10
                });
            })
            .catch(error => {
                swal("Error!", "Terdapat Masalah, Silahkan Hubungi Admin!", "error");
                this.setState({loading: false});
            });
    }

    // testTag() {
    //     axios
    //         .get("/masariuman_tag")
    //         .then(response => console.log(response.data.deeta_tag));
    // }

    componentDidMount() {
        this.getRefJafung();
        // console.log(this.state.jafung);
    }

    componentDidUpdate() {
        // this.getRefJafung();
    }

    renderJafung() {
        return !this.state.jafung.length ? <tr><td colSpan="3" className="text-center">Data Tidak Ditemukan</td></tr> :
            this.state.jafung.map(jafung => (
                <tr key={jafung.kode}>
                    <th scope="row">{jafung.nomor}</th>
                    <td>{jafung.nama_jab}</td>
                    <td>{jafung.nama_jenjang}</td>
                    <td>
                        <button data-target="#editModal" data-toggle="modal" className="mb-2 mr-2 border-0 btn-transition btn btn-shadow btn-outline-warning" type="button" onClick={this.handleEditButton.bind(this, jafung.url)}>Edit</button>
                        <button className="mb-2 mr-2 border-0 btn-transition btn btn-shadow btn-outline-danger" type="button" onClick={this.handleDeleteButton.bind(this, jafung.url)}>Delete</button>
                    </td>
                </tr>
            ));
    }

    modalTambah() {
        return (
            <div aria-hidden="true" className="onboarding-modal modal fade animated" id="tambahModal" role="dialog" tabIndex="-1">
                <div className="modal-dialog modal-lg modal-centered" role="document">
                    <div className="modal-content text-center">
                    <button aria-label="Close" className="close" data-dismiss="modal" type="button"><span className="close-label">Tutup</span><span className="os-icon os-icon-close"></span></button>
                    <div className="onboarding-side-by-side">
                        <div className="onboarding-media">
                        <img alt="" src="/iconModal/tagplus.png" width="200px" />
                        </div>
                        <div className="onboarding-content with-gradient">
                        <h4 className="onboarding-title">
                            Tambah Jabatan Fungsional Baru
                        </h4>
                        <div className="onboarding-text">
                            Masukkan Jabatan Fungsional baru.
                        </div>
                        <form onSubmit={this.handleSubmit}>
                            <div className="row">
                            <div className="col-sm-12">
                                <div className="form-group">
                                    <input
                                        onChange={this.handleChange}
                                        value={this.state.create}
                                        title="Nama  Jabatan Fungsional"
                                        placeholder="Masukkan Nama  Jabatan Fungsional Baru.."
                                        type="text"
                                        className="form-control"
                                    />
                                </div>
                            </div>
                            <div className="col-sm-12">
                                <div className="form-group text-center">
                                    <button className="mr-2 mb-2 btn btn-primary" data-target="#onboardingWideFormModal" data-toggle="modal" type="submit">Tambah  Jabatan Fungsional Baru</button>
                                </div>
                            </div>
                            </div>
                        </form>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        );
    }

    modalUbah() {
        return (
            <div aria-hidden="true" className="onboarding-modal modal fade animated" id="editModal" role="dialog" tabIndex="-1">
                <div className="modal-dialog modal-lg modal-centered" role="document">
                    <div className="modal-content text-center">
                    <button aria-label="Close" className="close" data-dismiss="modal" type="button"><span className="close-label">Tutup</span><span className="os-icon os-icon-close"></span></button>
                    <div className="onboarding-side-by-side">
                        <div className="onboarding-media">
                        <img alt="" src="/iconModal/tagEdit.png" width="200px" />
                        </div>
                        <div className="onboarding-content with-gradient">
                        <h4 className="onboarding-title">
                            Ubah Nama  Jabatan Fungsional
                        </h4>
                        <div className="onboarding-text">
                            Masukkan nama  Jabatan Fungsional baru.
                        </div>
                        <form onSubmit={this.handleEditSubmit}>
                            <div className="row">
                            <div className="col-sm-12">
                                <div className="form-group">
                                    <input
                                        onChange={this.handleEditInputChange}
                                        value={this.state.jafungEditInput}
                                        title="Nama  Jabatan Fungsional"
                                        placeholder="Masukkan Nama  Jabatan Fungsional Baru.."
                                        type="text"
                                        className="form-control"
                                    />
                                </div>
                            </div>
                            <div className="col-sm-12">
                                <div className="form-group text-center">
                                    <button className="mr-2 mb-2 btn btn-warning" data-target="#onboardingWideFormModal" data-toggle="modal" type="submit">Ubah Nama  Jabatan Fungsional</button>
                                </div>
                            </div>
                            </div>
                        </form>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        );
    }

    render() {
        return (
            this.state.loading === true ? <Loading /> :
            <div className="content-w">
                {/* title content */}
                <div className="top-bar color-scheme-transparent masariuman-height103px">
                    <div className="top-menu-controls masariuman-marginleft30px">
                        <div className="icon-w top-icon masariuman-titlecontent">
                        <div className="os-icon os-icon-jafung"></div>
                        </div>
                        <div className="masariuman-textleft">
                            <span className="masariuman-bold"> JABATAN FUNGSIONAL</span> <br/>
                            <small>Manajemen  Jabatan Fungsional</small>
                        </div>
                    </div>
                    <div className="top-menu-controls">
                        <button className="mr-2 mb-2 btn btn-outline-primary" type="button" id="petunjuk"><i className="batch-icon-bulb-2"></i> PETUNJUK <i className="batch-icon-bulb"></i></button>
                    </div>
                </div>
                <ul className="breadcrumb">
                    <li className="breadcrumb-item">
                        <a> JABATAN FUNGSIONAL</a>
                    </li>
                    <li className="breadcrumb-item">
                        <span>Manajemen  Jabatan Fungsional</span>
                    </li>
                </ul>

                {/* content */}
                <div className="content-i masariuman-minheight100vh">
                        <div className="content-box">
                            <div className="element-wrapper">
                                {/* content here */}
                                <div className="element-box">
                                    <h5 className="form-header">
                                         Daftar Jabatan Fungsional
                                    </h5>
                                    <div className="form-desc">
                                        Data Manajemen Jabatan Fungsional
                                    </div>
                                    <div>
                                        <button className="mr-2 mb-2 btn btn-primary" data-target="#tambahModal" data-toggle="modal" type="button" id="buttonTambahModal">Tambah  Jabatan Fungsional Baru</button>
                                        <div className="col-sm-4 float-right">
                                            <input type="text" className="form-control" onChange={this.handleChangeCari}
                                                value={this.state.cari} placeholder="Cari  Jabatan Fungsional..."></input>
                                        </div>
                                    </div>
                                    <div className="table-responsive" id="ruanganTable">
                                        <table id="tabeldata" width="100%" className="table table-striped table-lightfont">
                                            <thead>
                                                <tr>
                                                    <th className="width50px">NO</th>
                                                    <th> NAMA JABATAN FUNGSIONAL</th>
                                                    <th> JENJANG</th>
                                                    <th className="width250px">AKSI</th>
                                                </tr>
                                            </thead>
                                            <tbody>{this.renderJafung()}</tbody>
                                        </table>
                                    </div>
                                    <div className="d-flex justify-content-center">
                                        <Pagination
                                            activePage={this.state.activePage}
                                            itemsCountPerPage={this.state.itemsCountPerPage}
                                            totalItemsCount={this.state.totalItemsCount}
                                            pageRangeDisplayed={this.state.pageRangeDisplayed}
                                            onChange={this.handlePageChange}
                                        />
                                    </div>
                                </div>
                                {/* end content here */}
                            </div>
                            <DarkMode />
                        </div>
                    </div>
                <Footer />
                {this.modalTambah()}
                {this.modalUbah()}
            </div>
        );
    }
}

export default Keluarga;
