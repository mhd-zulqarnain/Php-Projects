<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Form</title>


<style>

.fn{
border: 1px solid; 
width:500px;
height:600px;
background:#CCCCCC;
}

.d, .m,.y{
width:150px;
height:30px;

}


.first{
width:200px;
height:25px;

}

.button {
background:#A8A8A8;
width:150px;
height:40px;
}

.button:hover {
    background-color: #4CAF50; 
    color: white;
}


</style>
</head>

<center>
<body>

<div class="fn">
<form action="Registration_from.php">

<h2>Registration Form</h2>

Title
<br />
    <input type="radio" name="gender" value="mr" checked> Mr.
  <input type="radio" name="gender" value="ms"> Ms.
  <input type="radio" name="gender" value="miss"> Miss.

<br /><br />
  
  First Name:
  <input type="text" name="firstname" placeholder="Type Your First Name"required class="first"/>
 <br /><br />
  Last Name:
  <input type="text" name="lastname" placeholder="Type Your Last Name"required class="first">
  
<!--  <br /><br />-->
<!--  N.I.C:-->
<!--  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="nic" placeholder="Type Your N.I.C Number"required class="first">-->
<!---->
<!--<br /><br />-->
<!--  Father Name:-->
<!--  <input type="text" name="fathername" placeholder="Type Your Father Name"required class="first">-->
<!---->
<!---->
<!--<br /><br />-->
<!--  Email:-->
<!--  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="email" placeholder="Type Your Email" required class="first">-->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  <br /><br />-->
<!--    Address:-->
<!--   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="address" placeholder="Type Your Address"required class="first">-->
<!--  -->
<!--  -->
<!--    <br /><br />-->
<!--    Contact No:-->
<!--  <input type="text" name="contactnumber" placeholder="Type Your Contact Number"required class="first">-->
<!---->
<!--  <h3>Date Of Birth:</h3>-->
<!--  <select class="d">-->
<!---->
<!--<option>Date</option>-->
<!--<option>1</option>-->
<!--<option>2</option>-->
<!--<option>3</option>-->
<!--<option>4</option>-->
<!--<option>5</option>-->
<!--<option>6</option>-->
<!--<option>7</option>-->
<!--<option>8</option>-->
<!--<option>9</option>-->
<!--<option>10</option>-->
<!--<option>11</option>-->
<!--<option>12</option>-->
<!--<option>13</option>-->
<!--<option>14</option>-->
<!--<option>15</option>-->
<!--<option>16</option>-->
<!--<option>17</option>-->
<!--<option>18</option>-->
<!--<option>19</option>-->
<!--<option>20</option>-->
<!--<option>21</option>-->
<!--<option>22</option>-->
<!--<option>23</option>-->
<!--<option>24</option>-->
<!--<option>25</option>-->
<!--<option>26</option>-->
<!--<option>27</option>-->
<!--<option>28</option>-->
<!--<option>29</option>-->
<!--<option>30</option>-->
<!--<option>31</option>-->
<!---->
<!---->
<!--</select>-->
<!--  -->
<!---->
<!--<select class="m">-->
<!---->
<!--<option>Month</option>-->
<!--<option>January</option>-->
<!--<option>February</option>-->
<!--<option>March</option>-->
<!--<option>April</option>-->
<!--<option>May</option>-->
<!--<option>June</option>-->
<!--<option>July</option>-->
<!--<option>August</option>-->
<!--<option>September</option>-->
<!--<option>October</option>-->
<!--<option>November</option>-->
<!--<option>December</option>-->
<!---->
<!--</select>-->
<!---->
<!---->
<!---->
<!--<select class="y">-->
<!--   <option>Year</option>-->
<!--  <option value="2016">2016</option>-->
<!--  -->
<!--                            <option value="2015">2015</option>-->
<!--                            <option value="2014">2014</option>-->
<!--                            <option value="2013">2013</option>-->
<!--                            <option value="2012">2012</option>-->
<!--                            <option value="2011">2011</option>-->
<!--                            <option value="2010">2010</option>-->
<!--                            <option value="2009">2009</option>-->
<!--                            <option value="2008">2008</option>-->
<!--                            <option value="2007">2007</option>-->
<!--                            <option value="2006">2006</option>-->
<!--                            <option value="2005">2005</option>-->
<!--                            <option value="2004">2004</option>-->
<!--                            <option value="2003">2003</option>-->
<!--                            <option value="2002">2002</option>-->
<!--                            <option value="2001">2001</option>-->
<!--                            <option value="2000">2000</option>-->
<!--                            <option value="1999">1999</option>-->
<!--                            <option value="1998">1998</option>-->
<!--                            <option value="1997">1997</option>-->
<!--                            <option value="1996">1996</option>-->
<!--                            <option value="1995">1995</option>-->
<!--                            <option value="1994">1994</option>-->
<!--                            <option value="1993">1993</option>-->
<!--                            <option value="1992">1992</option>-->
<!--                            <option value="1991">1991</option>-->
<!--                            <option value="1990">1990</option>-->
<!--                            <option value="1989">1989</option>-->
<!--                            <option value="1988">1988</option>-->
<!--                            <option value="1987">1987</option>-->
<!--                            <option value="1986">1986</option>-->
<!--                            <option value="1985">1985</option>-->
<!--                            <option value="1984">1984</option>-->
<!--                            <option value="1983">1983</option>-->
<!--                            <option value="1982">1982</option>-->
<!--                            <option value="1981">1981</option>-->
<!--                            <option value="1980">1980</option>-->
<!--                            <option value="1979">1979</option>-->
<!--                            <option value="1978">1978</option>-->
<!--                            <option value="1977">1977</option>-->
<!--                            <option value="1976">1976</option>-->
<!--                            <option value="1975">1975</option>-->
<!--                            <option value="1974">1974</option>-->
<!--                            <option value="1973">1973</option>-->
<!--                            <option value="1972">1972</option>-->
<!--                            <option value="1971">1971</option>-->
<!--                            <option value="1970">1970</option>-->
<!--                            <option value="1969">1969</option>-->
<!--                            <option value="1968">1968</option>-->
<!--                            <option value="1967">1967</option>-->
<!--                            <option value="1966">1966</option>-->
<!--                            <option value="1965">1965</option>-->
<!--                            <option value="1964">1964</option>-->
<!--                            <option value="1963">1963</option>-->
<!--                            <option value="1962">1962</option>-->
<!--                            <option value="1961">1961</option>-->
<!--                            <option value="1960">1960</option>-->
<!--                            <option value="1959">1959</option>-->
<!--                            <option value="1958">1958</option>-->
<!--                            <option value="1957">1957</option>-->
<!--                            <option value="1956">1956</option>-->
<!--                            <option value="1955">1955</option>-->
<!--                            <option value="1954">1954</option>-->
<!--                            <option value="1953">1953</option>-->
<!--                            <option value="1952">1952</option>-->
<!--                            <option value="1951">1951</option>-->
<!--                            <option value="1950">1950</option>-->
<!--                            <option value="1949">1949</option>-->
<!--                            <option value="1948">1948</option>-->
<!--                            <option value="1947">1947</option>-->
<!--                            <option value="1946">1946</option>-->
<!--                            <option value="1945">1945</option>-->
<!--                            <option value="1944">1944</option>-->
<!--                            <option value="1943">1943</option>-->
<!--                            <option value="1942">1942</option>-->
<!--                            <option value="1941">1941</option>-->
<!--                            <option value="1940">1940</option>-->
<!--                            <option value="1939">1939</option>-->
<!--                            <option value="1938">1938</option>-->
<!--                            <option value="1937">1937</option>-->
<!--                            <option value="1936">1936</option>-->
<!--                            <option value="1935">1935</option>-->
<!--                            <option value="1934">1934</option>-->
<!--                            <option value="1933">1933</option>-->
<!--                            <option value="1932">1932</option>-->
<!--                            <option value="1931">1931</option>-->
<!--                            <option value="1930">1930</option>-->
<!--                            <option value="1929">1929</option>-->
<!--                            <option value="1928">1928</option>-->
<!--                            <option value="1927">1927</option>-->
<!--                            <option value="1926">1926</option>-->
<!--                            <option value="1925">1925</option>-->
<!--                            <option value="1924">1924</option>-->
<!--                            <option value="1923">1923</option>-->
<!--                            <option value="1922">1922</option>-->
<!--                            <option value="1921">1921</option>-->
<!--                            <option value="1920">1920</option>-->
<!--                            <option value="1919">1919</option>-->
<!--                            <option value="1918">1918</option>-->
<!--                            <option value="1917">1917</option>-->
<!--                            <option value="1916">1916</option>-->
<!--                            <option value="1915">1915</option>-->
<!--                            <option value="1914">1914</option>-->
<!--                            <option value="1913">1913</option>-->
<!--                            <option value="1912">1912</option>-->
<!--                            <option value="1911">1911</option>-->
<!--                            <option value="1910">1910</option>-->
<!--                            <option value="1909">1909</option>-->
<!--                            <option value="1908">1908</option>-->
<!--                            <option value="1907">1907</option>-->
<!--                            <option value="1906">1906</option>-->
<!--                            <option value="1905">1905</option>-->
<!--                            <option value="1904">1904</option>-->
<!--                            <option value="1903">1903</option>-->
<!--                            <option value="1902">1902</option>-->
<!--                            <option value="1901">1901</option>-->
<!--                            <option value="1900">1900</option>-->
<!--                            <option value="1899">1899</option>-->
<!--                            <option value="1898">1898</option>-->
<!--                            <option value="1897">1897</option>-->
<!--                            <option value="1896">1896</option>-->
<!--                            <option value="1895">1895</option>-->
<!--                            <option value="1894">1894</option>-->
<!--                            <option value="1893">1893</option>-->
<!--                            <option value="1892">1892</option>-->
<!--                            <option value="1891">1891</option>-->
<!--                            <option value="1890">1890</option>-->
<!--                            <option value="1889">1889</option>-->
<!--                            <option value="1888">1888</option>-->
<!--                            <option value="1887">1887</option>-->
<!--                            <option value="1886">1886</option>-->
<!--                            <option value="1885">1885</option>-->
<!--                            <option value="1884">1884</option>-->
<!--                            <option value="1883">1883</option>-->
<!--                            <option value="1882">1882</option>-->
<!--                            <option value="1881">1881</option>-->
<!--                            <option value="1880">1880</option>-->
<!--                            <option value="1879">1879</option>-->
<!--                            <option value="1878">1878</option>-->
<!--                            <option value="1877">1877</option>-->
<!--                            <option value="1876">1876</option>-->
<!--                            <option value="1875">1875</option>-->
<!--                            <option value="1874">1874</option>-->
<!--                            <option value="1873">1873</option>-->
<!--                            <option value="1872">1872</option>-->
<!--                            <option value="1871">1871</option>-->
<!--                            <option value="1870">1870</option>-->
<!--                            <option value="1869">1869</option>-->
<!--                            <option value="1868">1868</option>-->
<!--                            <option value="1867">1867</option>-->
<!--                            <option value="1866">1866</option>-->
<!--							-->
<!--							</select>  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<br /><br />
<input type="submit" value="Submit" class="button" />


</form>
</div>
</body>
</html>
