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
import Keluarga from "./components/Keluarga"
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

    componentDidMount() {

    }

    render() {
        return (
            <Router>
                <MobileMenu />
                <Menu />
                <Routes>9
                    {/* <Route exact path="/" element={< LandingPage />} /> */}
                    <Route exact path="/keluarga" element={< Keluarga />} />
                    {/* <Route exact path="/referensi/jafung" element={< ReferensiJafung />} /> */}
                    {/* <Route exact path="/dataset/jabatan" element={< DatasetJabatan />} /> */}
                    <Route path="/" element={< Empatkosongempat />}/>
                </Routes>
            </Router>
            );
    }
}

export default ReactRouter;
