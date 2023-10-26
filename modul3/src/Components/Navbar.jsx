import React from "react";
import { Link } from "react-router-dom";

const Navbar = () => {
  return (
    <nav>
      {" "}
      navbar
      <ul>
        <li>
          <Link to="/home">Home</Link>
        </li>
        <li>
          <Link to="/about">About us</Link>
        </li>
        <li>
          <Link to="/contact">Contact</Link>
        </li>
      </ul>
    </nav>
  );
};

export default Navbar;
