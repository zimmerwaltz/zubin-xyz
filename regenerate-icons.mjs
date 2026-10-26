import { writeFileSync, mkdirSync, rmSync } from 'node:fs';
import { join } from 'node:path';
import { execSync } from 'node:child_process';

const frame = 20;
const outDir = 'assets/icons';

const icons = [
  ['arrow-right.svg', 'http://localhost:3845/assets/fce2342c0c4e232950091d205a99fa113f45e0ca.svg', 12.5, 18.75, 12.5, 18.75],
  ['behance.svg', 'http://localhost:3845/assets/9268a8f5d7d33cffd7a84efd1be0c2f2d2479a4f.svg', 12.5, 25, 12.5, 25],
  ['chevron-up.svg', 'http://localhost:3845/assets/3eca2d4197a9fc1bc0717bedac85f08b7eb9c6cd.svg', 15.63, 28.12, 15.62, 34.37],
  ['download.svg', 'http://localhost:3845/assets/1e99f5ccb6625bb75c73612d6fe0d847ac4bcad9.svg', 12.5, 9.38, 12.5, 15.63],
  ['email.svg', 'http://localhost:3845/assets/3b38c5e882a17854d3d3d90139961fd7f6652425.svg', 9.38, 18.75, 9.38, 18.75],
  ['human.svg', 'http://localhost:3845/assets/2ae1f0e4c320a69287647dc4015c0464d2bd9950.svg', 12.48, 3.12, 12.48, 6.04],
  ['instagram.svg', 'http://localhost:3845/assets/6861b77b02407f6c6a0d455de3f9bacebd22aefa.svg', 9.38, 9.38, 9.38, 9.38],
  ['linkedin.svg', 'http://localhost:3845/assets/6b779729297a6201f40cf2b7b8829d020cf1cc38.svg', 12.5, 12.5, 12.5, 12.5],
  ['logo-mark.svg', 'http://localhost:3845/assets/f701b4d979f533bd61a60422c174cc382b1d7b2c.svg', 18.75, 18.75, 18.75, 18.75],
  ['machine.svg', 'http://localhost:3845/assets/efae9be4b5e86bd3c010a332e7f46b8e459063c0.svg', 9.38, 3.13, 9.38, 12.5],
  ['medium.svg', 'http://localhost:3845/assets/4aaf1e41452726d1698babf919e65254340ea7db.svg', 12.5, 12.5, 12.5, 12.5],
  ['phone.svg', 'http://localhost:3845/assets/d225ac4298e8f2ce63ad9de8e89da7b9f692cd49.svg', 12.5, 9.38, 9.38, 12.5],
  ['plus.svg', 'http://localhost:3845/assets/847fe3caa1b4424b5858c849b4f2c9aff81b0662.svg', 12.5, 12.5, 12.5, 12.5],
  ['quote.svg', 'http://localhost:3845/assets/43722ec661bb20c8668e747db42f0f6df0a46d83.svg', 9.38, 18.75, 9.38, 18.75],
  ['view-portfolio.svg', 'http://localhost:3845/assets/0f034529d42de4037993e908cd494cbc6ed71b03.svg', 9.37, 9.37, 9.37, 9.37],
];

rmSync(outDir, { recursive: true, force: true });
mkdirSync(outDir, { recursive: true });

for (const [file, url, left, top, right, bottom] of icons) {
  const raw = execSync(`curl -sL "${url}"`, { encoding: 'utf8' });

  const vb = raw.match(/viewBox="([^"]+)"/);
  if (!vb) throw new Error(`Missing viewBox: ${file}`);
  const [minX, minY, vbW, vbH] = vb[1].split(/\s+/).map(Number);

  const inner = raw
    .replace(/^[\s\S]*?<svg[^>]*>/i, '')
    .replace(/<\/svg>\s*$/i, '')
    .replace(/var\(--fill-0,[^)]+\)/g, 'black');

  const boxW = frame * (1 - (left + right) / 100);
  const boxH = frame * (1 - (top + bottom) / 100);
  const sx = boxW / vbW;
  const sy = boxH / vbH;
  const tx = frame * (left / 100) - minX * sx;
  const ty = frame * (top / 100) - minY * sy;

  const out = [
    `<svg width="${frame}" height="${frame}" viewBox="0 0 ${frame} ${frame}" fill="none" xmlns="http://www.w3.org/2000/svg">`,
    `  <g transform="translate(${tx.toFixed(4)} ${ty.toFixed(4)}) scale(${sx.toFixed(6)} ${sy.toFixed(6)})">`,
    ...inner.trim().split('\n').map((line) => `    ${line}`),
    '  </g>',
    '</svg>',
    '',
  ].join('\n');

  writeFileSync(join(outDir, file), out, 'utf8');
}

console.log(`Generated ${icons.length} fixed-frame icons`);