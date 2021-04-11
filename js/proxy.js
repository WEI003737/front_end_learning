/* Proxy API: ES6 新增，用來代理物件的行為 */

const target = {a:'123', b: 'bbb'};
const handler = {
  set: (obj, prop, val) => {
    obj[prop] = val * 2;
  },
  get: (obj, prop) => {
    if (!obj[prop]) throw '沒有這個 key';
    return obj[prop]
  }
};

const objProxy = new Proxy(target, handler);
objProxy.a = 5;
console.log(objProxy.a);
// console.log(objProxy.abc);