import '../../assets/Css/header.css';
import SubHeader from './SubHeader.jsx';

function Header() {
  return (
    <div>
      <div className="header">
        <div className="HeaderList">
          <ul>
            <li>
            </li>

            <li>Item 2</li>
            <li>Item 3</li>
            <li>Item 4</li>
            <li>Item 5</li>
          </ul>
        </div>
      </div>
      <SubHeader /> 
    </div>
  );
}

export default Header;
