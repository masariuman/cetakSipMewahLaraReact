import React, { Component } from "react";
import {
    BrowserRouter as Router,
    Routes,
    Route
} from "react-router-dom";
import MobileMenu from "./layout/MobileMenu";
import Menu from "./layout/Menu";
import Empatkosongempat from "./layout/Empatkosongempat";
// import LandingPage from "./component/LandingPage";
// import ReferensiJafung from "./component/referensi/Jafung"
// import ReferensiRumpunJabatan from "./component/referensi/RumpunJabatan"
// import DatasetJabatan from "./component/dataset/Jabatan"
// import DashboardIndex from "./component/dashboard/Index";

class ReactRouter extends Component {
    constructor(props) {
        super(props);
        this.state = {
            level: ""
        };
    }

    // getUuzaa() {
    //     axios.get("/getUuzaa").then((response) => {
    //         this.setState({
    //             level: response.data.data.reberu
    //         });
    //     });
    // }

    componentDidMount() {
        // this.getUuzaa();
    }

    render() {
        return (
            <Router>
                <MobileMenu />
                <Menu />
                <Routes>
                    test
                    {/* <Route exact path="/" element={< LandingPage />} /> */}
                    {/* <Route exact path="/referensi/rumpun_jabatan" element={< ReferensiRumpunJabatan />} />
                    <Route exact path="/referensi/jafung" element={< ReferensiJafung />} />
                    <Route exact path="/dataset/jabatan" element={< DatasetJabatan />} /> */}
                    <Route path="/" element={< Empatkosongempat />}/>
                </Routes>
            </Router>
            );
    }
}

export default ReactRouter;
