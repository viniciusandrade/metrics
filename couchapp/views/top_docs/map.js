function(doc) {
  if (doc.type == 'doc') {
    emit([doc.date, doc.site, doc.title], 1);
  }
};
