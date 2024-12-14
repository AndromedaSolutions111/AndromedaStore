import React, { useState } from 'react';
import { FaUser, FaSearch, FaShoppingBag, FaBars } from 'react-icons/fa';
import '../../assets/Css/subHeader.css';

function SubHeader() {
    const [menuOpen, setMenuOpen] = useState(false);

    const toggleMenu = () => {
        setMenuOpen(!menuOpen);
    };

    return (
        <div className="subHeader">
            <nav className="menu">
                <ul className={`menu-list ${menuOpen ? 'active' : ''}`}>
                    <li>
                        <a href="/">Novidades</a>
                    </li>
                    <li>
                        <a href="/">Alimentação</a>
                    </li>
                    <li>
                        <a href="/">Acessórios</a>
                    </li>
                    <li>
                        <a href="/">Outros</a>
                    </li>
                </ul>
            </nav>

            <div className="User_info">
                <nav>
                    <ul>
                        <li>
                            <a href="/">
                                <FaUser size={20} />
                            </a>
                        </li>
                        <li>
                            <a href="/">
                                <FaSearch size={20} />
                            </a>
                        </li>
                        <li>
                            <a href="/">
                                <FaShoppingBag size={20} />
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

            <div className="hamburger-menu" onClick={toggleMenu}>
                <FaBars />
            </div>
        </div>
    );
}

export default SubHeader;
