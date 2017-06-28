/*
 Copyright (C) 2017  Hirokazu Seno

 This program is free software: you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 3 of the License, or
 (at your option) any later version.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with this program.  If not, see <http://www.gnu.org/licenses/>
 */
function conf() {
    //書き込み時の規約
    worn = confirm("書き込みに対し全責任を負い、\n" +
        "作者に対し権利の主張を行わないことに同意します");
    return worn;
}