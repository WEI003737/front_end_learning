/*
destructuring (變性、破壞性)
assignment (指定、賦值)
*/

/* arr */
let family = ['Lily', 'Bath', 'Sarah', 'Emma', 'Cindy'];
[a, b, c, d, e] = family;

let str = 'abcde';
[f, g, h, i, j] = str;

/* obj */
let animals = {
  bird: 'owl',
  insect: 'ant'
};
// let { bird, insect } = animals;

/* 重新賦予變數名稱 */
let { bird: bird2, insect } = animals;

/* 預設值 */
let [ ming = 'ming', jay = 'jay' ] = ['ming'];


console.log(ming);
console.log(jay);