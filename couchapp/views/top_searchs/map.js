function(doc) {
  if (doc.type == 'search') {
    emit([doc.date, doc.site, doc.title], 1);
  }
};
